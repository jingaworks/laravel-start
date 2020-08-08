<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('users');
            $table->unsignedInteger('serie_id');
            $table->foreign('serie_id')->references('id')->on('regions');
            $table->unsignedInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->unsignedInteger('place_id');
            $table->foreign('place_id')->references('id')->on('places');
        });
    }
}