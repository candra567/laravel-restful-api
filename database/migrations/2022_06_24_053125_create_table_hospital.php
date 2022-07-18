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
        Schema::create('table_hospital', function (Blueprint $table) {
            $table->id('id_hospital');
            $table->string('name_hospital');
            $table->foreignId('location_hospital')->references('id_regionals')->on('table_regionals');
            $table->string('name_doctor');
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
        Schema::dropIfExists('table_hospital');
    }
};
