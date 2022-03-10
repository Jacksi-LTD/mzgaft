<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAudiosTable extends Migration
{
    public function up()
    {
        Schema::table('audios', function (Blueprint $table) {
            $table->unsignedBigInteger('writer_id')->nullable();
            $table->foreign('writer_id', 'writer_fk_6176130')->references('id')->on('people');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_6176131')->references('id')->on('categories');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6176139')->references('id')->on('users');
        });
    }
}
