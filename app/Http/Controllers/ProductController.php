<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $produtos = Product::all();

        return view('home', compact('produtos'));
    }

    public function novoAnuncio(Request $request)
    {
        $produto = Product::find($request->product_id);
        $produtoImagens =  ProductImage::where('product_id', $produto->id)->select('source')->get();

        $anuncio = [
            'title' =>  $request->title_annunce,
            'category_id' =>  $request->id_category,
            'price' =>  (float)$request->price,
            'currency_id' =>  'BRL',
            'available_quantity' =>  $request->available_quantity,
            'buying_mode' =>  'buy_it_now',
            'listing_type_id' =>  $request->listing_type_id,
            'condition' =>  'new',
            'description' =>  $request->description,
            'video_id' =>  'YOUTUBE_ID_HERE',
            'tags' =>  [
                'immediate_payment'
            ],
            'sale_terms' => [
                [
                    'id' => 'WARRANTY_TYPE',
                    'value_name' => $request->warranty_type
                ],
                [
                    'id' => 'WARRANTY_TIME',
                    'value_name' => $request->warranty_time
                ]
            ],

            'pictures' =>  $produtoImagens
        ];

        $anuncio = (Object)$anuncio;

        $mercadoLivre = new MercadoLivreController();
        $mercadoLivre = $mercadoLivre->post($anuncio,'items');

        ProductAnnouncementsController::new($mercadoLivre, $request->product_id);

        return redirect(route('home'));
    }
}
