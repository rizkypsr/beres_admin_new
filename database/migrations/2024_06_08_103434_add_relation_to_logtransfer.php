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
        Schema::table('logtransfer', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kecamatan_transfer')->nullable()->change();
            $table->foreign('id_kecamatan_transfer')->references('id_kecamatan')->on('kecamatan')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logtransfer', function (Blueprint $table) {
            $table->dropForeign(['id_kecamatan_transfer']);
            $table->unsignedBigInteger('id_kecamatan_transfer')->nullable(false)->change();
        });
    }
};
