<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->longText('product_short_description');
            $table->longText('product_long_description');
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->integer('manu_factures_id')->unsigned();
            $table->foreign('manu_factures_id')->references('id')->on('manu_factures');
            $table->float('product_price');
            $table->string('product_image');
            $table->string('product_color');
            $table->integer('publication_status');
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
        Schema::dropIfExists('products');
    }
}
