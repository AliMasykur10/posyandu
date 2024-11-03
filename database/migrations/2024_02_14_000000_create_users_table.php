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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name')->unique()->nullable();
            $table->string('password');
            $table->enum('role', ['keluarga', 'bidan', 'kader', 'admin', 'puskesmas', 'kepalaDesa']);
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
            $table->unsignedBigInteger('officer_id')->nullable();
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');
            $table->unsignedBigInteger('midwife_id')->nullable();
            $table->foreign('midwife_id')->references('id')->on('midwives')->onDelete('cascade');
            $table->unsignedBigInteger('kepalaDesa_id')->nullable();
            $table->foreign('kepalaDesa_id')->references('id')->on('kepala_desas')->onDelete('cascade');
            $table->unsignedBigInteger('puskesmas_id')->nullable();
            $table->foreign('puskesmas_id')->references('id')->on('puskesmas')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
