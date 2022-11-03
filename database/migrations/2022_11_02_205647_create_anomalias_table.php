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
        Schema::create('anomalias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensores_id');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->unsignedBigInteger('problemas_id')->nullable();
            $table->unsignedBigInteger('soluciones_id')->nullable();
            $table->unsignedBigInteger('vigilancias_id')->nullable();
            $table->dateTime('inicio')->nullable();
            $table->dateTime('fin')->nullable();
            $table->text('observaciones');
            $table->timestamps();

            $table->foreign('sensores_id')->references('id')->on('sensores');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('problemas_id')->references('id')->on('problemas');
            $table->foreign('soluciones_id')->references('id')->on('soluciones');
            $table->foreign('vigilancias_id')->references('id')->on('vigilancias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anomalias');
    }
};
