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
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->integer('price');
            $table->integer('quantity');
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('seller_id')->unsigned();
            $table->string('warranty');

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
            $table->foreign('brand_id')
                  ->references('id')->on('brands')
                  ->onDelete('cascade');
            $table->foreign('seller_id')
                  ->references('id')->on('sellers')
                  ->onDelete('cascade');      
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
