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
        Schema::create('pus_wuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('jumlah_anak');
            $table->string('status_imunisasi');
            $table->string('kontrasepsi');
            $table->string('ganti_kontrasepsi');
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
        Schema::dropIfExists('pus_wuses');
    }
};
