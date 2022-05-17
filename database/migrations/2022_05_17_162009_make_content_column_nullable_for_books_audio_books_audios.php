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
        Schema::table('books', function (Blueprint $table) {
            $table->longText('content')->nullable()->change();
        });
        Schema::table('audios', function (Blueprint $table) {
            $table->longText('content')->nullable()->change();
        });
        Schema::table('audio_books', function (Blueprint $table) {
            $table->longText('content')->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
