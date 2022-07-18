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
    //     Schema::create('table_spots_vaccins', function (Blueprint $table) {
    //         $table->id('id_spots_vaccins');
    //         $table->foreignId('locations_spots_vaccins')->references('id_hospital')->on('table_hospital');
    //         $table->foreignId('lists_vaccins')->references('id_vaccins')->on('table_vaccins');
    //         $table->timestamps();
    //     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_spots_vaccins');
    }
};
