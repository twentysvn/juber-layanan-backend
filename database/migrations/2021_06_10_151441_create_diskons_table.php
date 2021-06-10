<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskon', function (Blueprint $table) {
            $table->id();
            $table->string('idrs');
            $table->string('nama');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->string('tipe_diskon');
            $table->string('diskon_deksripsi');
            $table->string('min_qty');
            $table->string('diskon_nilai');
            $table->string('batas_pembelian')->default(0);
            $table->string('produk');
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
        Schema::dropIfExists('diskon');
    }
}
