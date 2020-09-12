<?php

return [

    'base_url' => env('ML_BASE_URL','https://auth.mercadolivre.com.br/'),
    'app_id' => env('ML_APP_ID',''),
    'client_secret' => env('ML_CLIENT_SECRET',''),
    'redirect_url' => env('ML_REDIRECT_URL', 'http://localhost:8080/callback'),
    'url' =>  env('ML_BASE_URL','https://auth.mercadolivre.com.br/')
                .'authorization?response_type=code&client_id='
                .env('ML_APP_ID','')
                .'&redirect_uri='
                .env('ML_REDIRECT_URL', 'http://localhost:8080/callback'),

];
