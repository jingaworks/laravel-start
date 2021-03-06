<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->decimal('price_starts', 15, 2);
            $table->decimal('price_ends', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}