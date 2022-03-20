<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("categoryName");
        //     $table->string('subCategoryCode', 10);
            $table->string("subCategoryName");
            $table->string("categoryDescription");
            $table->string("categorySlug");
            $table->string("categoryImage")->nullable();
            $table->boolean("categoryStatus")->default(1);
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
        Schema::dropIfExists('categories');
    }
}