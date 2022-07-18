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
        Schema::create('table_users_vaksin', function (Blueprint $table) {
            $table->id('id_users_vaksin');
            $table->integer('id_card_users_vaksin')->unsigned();
            $table->string('password_users_vaksin');
            $table->string('name_users_vaksin');
            $table->enum('gender_users_vaksin',['male','female']);
            $table->date('born_date_users_vaksin');
            $table->foreignId('regionals_users_vaksin')->references('id_regionals')->on('table_regionals');
            $table->string('login_tokens_users')->nullable();
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
        Schema::dropIfExists('table_users_vaksin');
    }
};
