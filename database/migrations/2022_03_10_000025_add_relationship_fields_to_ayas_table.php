<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAyasTable extends Migration
{
    public function up()
    {
        Schema::table('ayas', function (Blueprint $table) {
            $table->unsignedBigInteger('surah_id')->nullable();
            $table->foreign('surah_id', 'surah_fk_6176185')->references('id')->on('surahs');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6176184')->references('id')->on('users');
        });
    }
}
