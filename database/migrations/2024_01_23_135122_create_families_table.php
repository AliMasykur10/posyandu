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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('nkk')->unique();
            $table->string('nik_ibu')->unique();
            $table->string('nama_ibu');
            $table->date('date_of_birth_ibu');
            $table->string('place_of_birth_ibu');
            $table->enum('golongan_darah_ibu', ['A', 'B', 'AB', 'O']);
            $table->string('nik_ayah')->unique();
            $table->string('nama_ayah');
            $table->date('date_of_birth_ayah');
            $table->string('place_of_birth_ayah');
            $table->enum('golongan_darah_ayah', ['A', 'B', 'AB', 'O']);
            $table->string('address');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('posyandu');
            $table->string('phone_number')->unique();
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
        Schema::dropIfExists('families');
    }
};
