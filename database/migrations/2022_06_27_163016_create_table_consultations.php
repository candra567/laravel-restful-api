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
        Schema::create('table_consultations', function (Blueprint $table) {
            $table->id('id_consultations');
            $table->foreignId('users_consultations')->references('id_users_vaksin')->on('table_users_vaksin')->onUpdate('cascade')->onDelete('cascade');
            $table->string('disease_history')->nullable();
            $table->string('current_symptoms')->nullable();
            $table->foreignId('officer_consultations')->references('id_officer')->on('table_officer');
            $table->enum('status_consultations',['pending','accepted','cancel'])->default('pending');
            $table->enum('number_consultations',[1,2]);
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
        Schema::dropIfExists('table_consultations');
    }
};
