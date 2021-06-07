<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 250);
            $table->string("idrs", 7);
            $table->string("no_rek", 250);
            $table->foreignId("kode_bank");
            $table->string("nama_bank", 250);
            $table->string("nama_detail_bank", 250);
            $table->string("cabang", 250);
            $table->string("kota", 250);
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
        Schema::dropIfExists('rekenings');
    }
}
