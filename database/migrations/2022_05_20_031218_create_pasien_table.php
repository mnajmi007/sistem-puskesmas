<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_rm');
            $table->string('status_jkn')->nullable();
            $table->integer('nik')->nullable();
            $table->text('alamat');
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('kelurahan')->nullable();;
            $table->string('alamat_domisili')->nullable();;
            $table->integer('rt_domisili')->nullable();;
            $table->integer('rw_domisili')->nullable();;
            $table->integer('no_telp');
            $table->string('tempat_lahir')->nullable();;
            $table->date('tgl_lahir');
            $table->string('gender')->nullable();;
            $table->string('gol_dar')->nullable();;
            $table->string('stat_pasien')->nullable();;
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
        Schema::dropIfExists('pasien');
    }
};
