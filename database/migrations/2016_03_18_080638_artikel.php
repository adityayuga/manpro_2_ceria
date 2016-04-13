<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Artikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('artikel',
         function(Blueprint $table){
            $table->increments('id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('path');
            $table->text('content');
            $table->string('slug');
            $table->string('kategori');
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
        //
        Schema::drop("artikel");
    }
}
