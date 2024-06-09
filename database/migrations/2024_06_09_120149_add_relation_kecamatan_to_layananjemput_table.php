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
        Schema::table('layanan_jemput', function (Blueprint $table) {
            $table->unsignedBigInteger('kecamatan_layanan')->change();
            $table->foreign('kecamatan_layanan')->references('id_kecamatan')->on('kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('layananjemput', function (Blueprint $table) {
            $table->dropForeign(['kecamatan_layanan']);
        });
    }
};
