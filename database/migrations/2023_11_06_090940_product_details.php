<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('product_details', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->double('price');
        $table->integer('quantity');
        $table->text('description');
        $table->unsignedBigInteger('category_id');
        $table->foreign('category')->references('id')->on('category_details');
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
        //
    }
}
