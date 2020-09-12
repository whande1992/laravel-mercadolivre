<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductAnnouncement;
use Illuminate\Http\Request;

class ProductAnnouncementsController extends Controller
{
    public function index()
    {
        $anuncios = MercadoLivreController::getAnunciosLista(); // Retorna uma lista de anuncios

        foreach ($anuncios as $anuncio) {
           $items [] = MercadoLivreController::getAnuncio($anuncio); // Retorna informações de cada anuncio
        }
        return view('mercado-livre.listar-anuncios', compact('items'));
    }

    public static function new($item, $product_id)
    {
        //Rever a necessidade dessas informações
        //Registra informações de anuncios no banco de dados
        $item = json_decode($item);

        $announcement = new ProductAnnouncement();
        $announcement->product_id = $product_id;
        $announcement->ml_id = $item->id;
        $announcement->seller_id = $item->seller_id;
        $announcement->category_id = $item->category_id;
        $announcement->price = $item->price;
        $announcement->available_quantity = $item->available_quantity;
        $announcement->buying_mode = $item->buying_mode;
        $announcement->listing_type_id = $item->listing_type_id;
        $announcement->expiration_time = $item->expiration_time;
        $announcement->condition = $item->condition;
        $announcement->permalink = $item->permalink;
        $announcement->status = $item->status;
        $announcement->save();

        // Vincula ID da categoria no produto
        $product = Product::find($product_id);
        $product->ml_category_id = $item->category_id;
        $product->save();

    }


}
