<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioBooksTable extends Migration
{
    public function up()
    {
        Schema::create('audio_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('visits')->nullable();
            $table->longText('content');
            $table->boolean('approved')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
