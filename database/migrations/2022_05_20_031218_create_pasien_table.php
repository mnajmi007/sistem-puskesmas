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
            $table->integer('nik');
            $table->text('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('kelurahan');
            $table->string('alamat_domisili');
            $table->integer('rt_domisili');
            $table->integer('rw_domisili');
            $table->integer('no_telp');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('gender');
            $table->string('gol_dar');
            $table->string('stat_pasien');
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
