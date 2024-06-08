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
        Schema::create('qurbansampah', function (Blueprint $table) {
            $table->id('id_qurban');
            $table->string('gambar_qurban');
            $table->string('nama_qurban');
            $table->text('deskripsi_qurban');
<<<<<<< HEAD
            
=======

>>>>>>> 0943348 (initial commit)
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
        Schema::dropIfExists('qurbansampah');
    }
};
