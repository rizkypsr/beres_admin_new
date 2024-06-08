<?php

use Illuminate\Database\Migrations\Migration;
<<<<<<< HEAD
use Illuminate\Database\Schema\Blueprint;
=======
>>>>>>> 0943348 (initial commit)
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
        Schema::dropIfExists('elearnings');
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
