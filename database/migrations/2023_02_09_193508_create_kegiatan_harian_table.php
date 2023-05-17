<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanHarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_harian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id');
            $table->string('name');
            $table->string('nama_kegiatan');
            $table->date('tanggal');
            $table->text('detail_kegiatan');
            $table->string('bukti_kegiatan');
            // $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('kegiatan_harian');
    }
}
