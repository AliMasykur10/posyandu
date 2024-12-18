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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('jenis_kegiatan');
            $table->date('tanggal');
            $table->string('nama_sasaran');
            $table->string('kepala_keluarga');
            $table->string('alamat');
            $table->string('hasil_kegiatan');
            $table->string('petugas');
            $table->string('keterangan');
            $table->string('posyandu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunjungans');
    }
};
