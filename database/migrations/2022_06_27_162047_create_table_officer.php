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
        Schema::create('table_officer', function (Blueprint $table) {
            $table->id('id_officer');
            $table->integer('id_card_officer');
            $table->string('name_officer');
            $table->string('password_officer');
            $table->foreignId('regionals_officer')->references('id_regionals')->on('table_regionals');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_officer');
    }
};
