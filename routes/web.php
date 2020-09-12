<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');
Route::get('/callback', function () { return view('mercado-livre.callback');} );

Route::get('/anuncios', 'ProductAnnouncementsController@index' )->name('anuncios.index');
Route::post('/anuncio/novo/post', 'ProductController@novoAnuncio' )->name('anuncio.post');

Route::get('/product/{product}', function (App\Product $product) {
    return view('mercado-livre.anunciar', compact('product'));
} );
