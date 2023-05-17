<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id');
            $table->string('nama_aduan');
            $table->string('id_jenis_laporan')->default('0');
            $table->string('laporan_polisi');
            $table->string('pelapor');
            $table->string('terlapor');
            $table->date('tanggal');
            $table->text('uraian');
            $table->string('file_aduan');
            // $table->unsignedBigInteger('user_id')->nullable();

            // $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('pelaporan');
    }
}
