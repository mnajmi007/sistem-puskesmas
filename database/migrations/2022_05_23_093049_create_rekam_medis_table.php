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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->string('id_rm');
            $table->string('no_rm');
            $table->string('id_poli');
            $table->date('jam_periksa');
            $table->string('subjective')->nullable();;
            $table->string('kesadaran')->nullable();;
            $table->string('bb')->nullable();;
            $table->string('tb')->nullable();;
            $table->string('tekanan_darah')->nullable();;
            $table->string('heart_rate')->nullable();;
            $table->string('respiratory_rate')->nullable();;
            $table->date('tgl_periksa');
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
        Schema::dropIfExists('rekam_medis');
    }
};
