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
        Schema::create('persediaan_bahans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('bulan');
            $table->string('nama_barang');
            $table->date('tanggal_terima');
            $table->string('asal');
            $table->string('jumlah');
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
        Schema::dropIfExists('persediaan_bahans');
    }
};
