<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AhpMatrixMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahp_matrix', function (Blueprint $table) {
            $table->id();
            $table->string('criteria');
            $table->integer('biaya_masuk');
            $table->integer('jarak');
            $table->integer('fasilitas');
            $table->integer('wahana');
            $table->integer('waktu_operasional');
            $table->integer('ulasan');
            // tambahkan kolom lain sesuai kebutuhan
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
        Schema::dropIfExists('ahp_matrix');
    }
}
