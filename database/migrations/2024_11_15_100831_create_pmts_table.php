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
        Schema::create('pmts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('menu');
            $table->date('tanggal');
            $table->string('biaya');
            $table->string('sasaran');
            $table->string('status');
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
        Schema::dropIfExists('pmts');
    }
};
