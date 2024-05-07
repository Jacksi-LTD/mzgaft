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
        Schema::create('hadiths', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('chapter_id');
            $table->string('number');
            $table->string('title');
            $table->text('details');
            $table->string('narrated_by');
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
        Schema::dropIfExists('hadiths');
    }
};
