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
        Schema::create('officers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik');
            $table->enum('posyandu', ['anggrek', 'mawar', "melati", 'kamboja', 'matahari']);
            $table->string('desa');
            $table->string('kecamatan');
            $table->integer('tahun_menjadi');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->text('address')->nullable();
            $table->enum('position', ['Ketua', 'Anggota', 'Bendahara']);
            $table->String('last_educations');
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
        Schema::dropIfExists('officers');
    }
};
