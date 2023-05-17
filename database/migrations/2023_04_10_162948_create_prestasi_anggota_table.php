<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi_anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id');
            $table->string('name');
            $table->string('judul_prestasi');
            $table->date('tanggal');
            $table->text('detail');
            $table->string('foto_prestasi');
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
        Schema::dropIfExists('prestasi_anggota');
    }
}
