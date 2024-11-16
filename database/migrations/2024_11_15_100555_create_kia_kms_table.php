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
        Schema::create('kia_kms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('bulan');
            $table->date('tanggal_terima');
            $table->string('nama_barang');
            $table->string('asal');
            $table->string('jumlah');
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
        Schema::dropIfExists('kia_kms');
    }
};
