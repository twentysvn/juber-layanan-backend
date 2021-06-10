<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string('idrs');
            $table->string('nama');
            $table->enum("tipe", [1, 2])->default(1);
            $table->string('tipe_deskripsi');
            $table->string('kode');
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->integer('kuota_klaim');
            $table->integer('kuota_pemakaian');
            $table->enum('jenis_diskon', [1, 2])->default(1);
            $table->string('jenis_diskon_deskripsi');
            $table->string('nilai_diskon');
            $table->enum('diskon_batas', [0, 1])->default(1);
            $table->integer('diskon_batas_nilai')->default(0);
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
        Schema::dropIfExists('voucher');
    }
}
