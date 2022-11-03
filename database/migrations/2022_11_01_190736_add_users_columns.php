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
        Schema::table('users', function(Blueprint $table){
            // $table->unsignedBigInteger('sectores_id')->nullable();
            $table->unsignedBigInteger('perfiles_id')->nullable();
            $table->text('avatar')->default('img/avatar.png');

            // $table->foreign('sectores_id')->references('id')->on('sectores');
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
        Schema::table('users', function(Blueprint $table){
            // $table->dropConstrainedForeignId('sectores_id');
            $table->dropConstrainedForeignId('perfiles_id');
            $table->dropColumn('avatar');
        });
    }
};
