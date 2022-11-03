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
        Schema::create('sectores_users', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->primary(['sectores_id', 'users_id']);
            $table->unsignedBigInteger('sectores_id');
            $table->unsignedBigInteger('users_id');

            $table->foreign('sectores_id')->references('id')->on('sectores');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectores_users');
    }
};
