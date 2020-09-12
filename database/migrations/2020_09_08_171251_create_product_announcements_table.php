<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('ml_id');
            $table->string('seller_id');
            $table->string('category_id');
            $table->string('price');
            $table->string('currency_id')->default('BRL');
            $table->integer('available_quantity');
            $table->string('buying_mode');
            $table->string('listing_type_id');
            $table->dateTimeTz('expiration_time');
            $table->string('condition');
            $table->string('permalink');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_announcements');
    }
}
