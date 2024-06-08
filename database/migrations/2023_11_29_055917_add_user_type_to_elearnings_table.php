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
        Schema::table('elearnings', function (Blueprint $table) {
            $table->string('user_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elearnings', function (Blueprint $table) {
<<<<<<< HEAD
            $table->dropColumn(['user_type',]);
=======
            $table->dropColumn(['user_type']);
>>>>>>> 0943348 (initial commit)
        });
    }
};
