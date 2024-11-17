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
        Schema::create('ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_ibu');
            $table->string('nama_suami');
            $table->string('alamat');
            $table->string('umur_kehamilan');
            $table->string('hamil_keberapa');
            $table->string('faktor_risiko');
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
        Schema::dropIfExists('ibu_hamils');
    }
};
