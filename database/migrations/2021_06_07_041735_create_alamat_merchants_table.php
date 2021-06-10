<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_merchant', function (Blueprint $table) {
            $table->id();
            $table->string('mc_id');
            $table->string('idrs');
            $table->string('nama');
            $table->string('no_hp');
            $table->string('id_provinsi');
            $table->string('provinsi');
            $table->string('id_kota_kab');
            $table->string('kota_kab');
            $table->string('id_kecamatan');
            $table->string('kecamatan');
            $table->string('kode_pos');
            $table->string('jalan');
            $table->string('rincian')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
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
        Schema::dropIfExists('alamat_merchant');
    }
}
