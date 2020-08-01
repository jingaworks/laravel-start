<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtestatsTable extends Migration
{
    public function up()
    {
        Schema::create('atestats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('address');
            $table->integer('number');
            $table->string('valid_year');
            $table->timestamps();
        });
    }
}