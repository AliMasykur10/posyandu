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
        Schema::create('service_children', function (Blueprint $table) {
            $table->id();
            // For All
            $table->unsignedBigInteger('child_id')->nullable();
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
            // during weighing
            $table->date('weigh_date')->nullable();
            $table->string('age_at_weighing')->nullable();
            $table->string('body_weight_at_weighing')->nullable();
            $table->string('height_at_weighing')->nullable();
            $table->enum('in_accordance', ['y', 'n'])->nullable();
            $table->string('information_at_weighing')->nullable();
            // During Immunization
            $table->date('immunization_date')->nullable();
            $table->string('age_at_immunization')->nullable();
            $table->string('immunization')->nullable();
            $table->enum('vitamins_a', ['Blue', 'Red'])->nullable();
            $table->string('information_at_immunization')->nullable();
            // For All
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
        Schema::dropIfExists('service_children');
    }
};