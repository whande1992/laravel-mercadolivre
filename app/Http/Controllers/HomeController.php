<?php

namespace App\Http\Controllers;

use App\Product;
use http\Exception;
use Illuminate\Http\Request;
use Meli\Configuration;
use Meli\Api\OAuth20Api;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
