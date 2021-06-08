<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNPWPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npwp', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 250);
            $table->string("idrs", 7);
            $table->string('alamat');
            $table->string('npwp');
            $table->string('nik');
            $table->string('npwp_img');
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
        Schema::dropIfExists('n_p_w_p_s');
    }
}
