<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->string('brand');
            $table->string('product_name');
            $table->string('category');
            $table->string('subcategory');
            $table->string('price_£');
            $table->string('price_per');
            $table->text('ingredients');
            $table->text('allergen_information');
            $table->text('recycling_information');
            $table->string('product_link');
            $table->text('brand_details');
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
};
