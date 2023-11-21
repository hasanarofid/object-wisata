<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelPantai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_pantai', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('gambar')->nullable();
            $table->string('jarak')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('biaya_masuk')->nullable();
            $table->string('fasilitas')->nullable();
            $table->string('wahana')->nullable();
            $table->string('waktu_operasional')->nullable();
            $table->string('ulasan')->nullable();
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
        Schema::dropIfExists('tabel_pantai');
    }
}
