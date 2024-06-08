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
            $table->unsignedBigInteger('pengirim')->change();
            $table->unsignedBigInteger('penerima')->change();
            $table->foreign('pengirim')->references('id_customer')->on('customer');
            $table->foreign('penerima')->references('id_customer')->on('customer');
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
            $table->dropForeign(['pengirim']);
            $table->dropForeign(['penerima']);
        });
    }
};
