<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string("nama_toko", 250);
            $table->string("idrs", 7)->unique();
            $table->enum("gender", [0, 1, 2])->default(0);
            $table->string("tanggal_lahir", 250)->nullable();
            $table->string("profile_img", 250);
            $table->string("cover_img", 250)->nullable();
            $table->string("profile", 250)->nullable();
            $table->string("pin", 6);
            $table->string("no_hp", 13);
            $table->string("id_alamat")->nullable();
            $table->enum("toko_foodish", [0, 1])->default(0);
            $table->enum("toko_layanan", [0, 1])->default(0);
            $table->string("token", 250)->nullable();
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
        Schema::dropIfExists('merchants');
    }
}
