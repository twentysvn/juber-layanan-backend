<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodishProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodish_produk', function (Blueprint $table) {
            $table->id();
            $table->string('mc_id', 255);
            $table->string('idrs', 255);
            $table->string('nama', 255);
            $table->string('deskripsi', 255);
            $table->string('id_kategori', 255);
            $table->string('kategori', 255);
            $table->integer('harga');
            $table->enum('id_delivery', [1, 2, 3])->default(1);
            $table->string('delivery', 255);
            $table->integer('harga_delivery');
            $table->float('berat');
            $table->string('gambar', 255);
            $table->boolean('aktif')->default(false);
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
        Schema::dropIfExists('foodish_products');
    }
}
