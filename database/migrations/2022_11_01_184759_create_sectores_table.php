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
        Schema::create('sectores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perfiles_id');
            $table->unsignedBigInteger('centros_id');
            $table->string('nombre', 40)->unique();
            $table->timestamps();

            $table->foreign('centros_id')->references('id')->on('centros');
            $table->foreign('perfiles_id')->references('id')->on('perfiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectores');
    }
};
