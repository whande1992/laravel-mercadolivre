<?php

namespace App\Http\Controllers;

use http\Exception;
use Illuminate\Support\Facades\Cache;
use Meli\Api\OAuth20Api;
use GuzzleHttp\Client;
use Meli\Api\RestClientApi;
use Meli\Api\ItemsApi;

class MercadoLivreController extends Controller
{

    public function token()
    {
        // Verifica se o token em cache ainda é valido
        if (!Cache::has('meli_token')) {
            $apiInstance = new OAuth20Api(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
                new Client()
            );

            $refresh_token = Cache::get('meli_refresh_token', ''); // Refresh token em cache
            $grant_type = $refresh_token ? 'refresh_token' : 'authorization_code'; // Verifica se existe um refresh_token para gerar um novo token
            $client_id = config('mercadolivre.app_id'); // Your client_id
            $client_secret = config('mercadolivre.client_secret');  // Your client_secret
            $redirect_uri = config('mercadolivre.redirect_url'); // Your redirect_uri
            $code = Cache::get('meli_code');

            try {
                $result = $apiInstance->getToken($grant_type, $client_id, $client_secret, $redirect_uri, $code, $refresh_token);
                $result = json_decode($result[0]);
                Cache::put('meli_token', $result, $result->expires_in); //Armazena o token em cache com a data de expiração
                Cache::put('meli_refresh_token', $result->refresh_token); // Armazena o refresh token

            } catch (Exception $e) {
                echo 'Exception when calling OAuth20Api->getToken: ', $e->getMessage(), PHP_EOL;
            }
        }
        $token = Cache::get('meli_token');

        return  $token;
    }

    public static function getAnunciosLista()
    {
        $access_token = (new MercadoLivreController)->token()->access_token;
        $user_id = (new MercadoLivreController)->token()->user_id;
        $base_url = 'https://api.mercadolibre.com/users/'.$user_id.'/items/search?status=active&access_token='.$access_token;

        $request = new Client();

        try {
            $result = $request->get($base_url);
            $items = json_decode($result->getBody());

            return $items->results;

        } catch (Exception $e) {
            echo 'Exception when calling RestClientApi->resourcePost: ', $e->getMessage(), PHP_EOL;
        }
    }

    public static function getAnuncio($id)
    {
        $apiInstance = new ItemsApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new Client()
        );

        try {
            $result = $apiInstance->itemsIdGet($id);
            return json_decode($result[0]);
        } catch (Exception $e) {
            echo 'Exception when calling ItemsApi->itemsIdGet: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function post($body, $resource)
    {
       // return json_encode($this->item());
        $apiInstance = new RestClientApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new Client()
        );
        $access_token = $this->token()->access_token; // string |

        try {
            $result = $apiInstance->resourcePost($resource, $access_token, $body);
            return $result[0];
        } catch (Exception $e) {
            echo 'Exception when calling RestClientApi->resourcePost: ', $e->getMessage(), PHP_EOL;
        }
    }
}
