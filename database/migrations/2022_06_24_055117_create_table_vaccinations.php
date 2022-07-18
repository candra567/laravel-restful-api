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
        Schema::create('table_vaccinations', function (Blueprint $table) {
            $table->id('id_vaccinations');
            $table->foreignId('users_vaccinations')->references('id_users_vaksin')->on('table_users_vaksin');
            $table->integer('dose_vaccinations')->unsigned();
            $table->date('date_vaccinations');
            $table->foreignId('locations_vaccins')->references('id_hospital')->on('table_hospital');
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
        Schema::dropIfExists('table_vaccinations');
    }
};
