<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


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
            $table->id();
            $table->string('title');
            $table->string('product_slug');
            $table->string('SKU');
            $table->integer('price');
            $table->enum('size',['XS','S','M','L','XL']);
            $table->text('description');
            $table->binary('enabled')->default(0);
            $table->integer('stock');
            $table->string('product_image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('Category_id')->references('id')->on('categories');
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
