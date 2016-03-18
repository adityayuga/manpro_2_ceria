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
            $table->string('judul', 30);
            $table->string('content', 500);
            $table->date('tanggal');
            $table->string('penulis', 30);
            $table->string('slug', 30);
            $table->integer('kategori');
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
