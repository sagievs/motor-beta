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
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('ismain')->default(0)->nullable();
            $table->boolean('ishit')->default(0)->nullable();
            $table->integer('category_id')->default(1)->nullable();
            $table->string('metatitle')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->boolean('onsale')->default(1)->nullable();
            $table->boolean('active')->default(1)->nullable();
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
