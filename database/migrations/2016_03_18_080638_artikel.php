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
            $table->text('content');
<<<<<<< HEAD
            $table->date('tanggal');
            $table->string('slug');
            $table->string('kategori');
=======
            $table->string('slug');
            $table->string('kategori');
            $table->timestamps();
>>>>>>> 4817e48e5180450248e4573b59f691b53380fe72
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
