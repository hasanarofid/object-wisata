<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('alternatif')->nullable();
            $table->string('k1')->nullable();
            $table->string('k2')->nullable();
            $table->string('k3')->nullable();
            $table->string('k4')->nullable();
            $table->string('k5')->nullable();
            $table->string('k6')->nullable();
            $table->string('skorR')->nullable();
            $table->string('skorS')->nullable();
            $table->string('skorQ')->nullable();
            $table->unsignedBigInteger('pantai_id');
            $table->foreign('pantai_id')->references('id')->on('tabel_pantai');
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
        Schema::dropIfExists('alternatif');
    }
}
