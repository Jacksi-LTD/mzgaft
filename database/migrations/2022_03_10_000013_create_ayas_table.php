<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyasTable extends Migration
{
    public function up()
    {
        Schema::create('ayas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('aya');
            $table->integer('number');
            $table->longText('tafsir')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
