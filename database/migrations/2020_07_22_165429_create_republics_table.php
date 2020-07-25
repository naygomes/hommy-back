<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger("user_id")->nullable();
            $table->string("name");
            $table->string("cep");
            $table->string("complement");
            $table->integer("number")-> unsigned();
            $table->float("price")->default(0)->unsigned();
            $table->integer("vacancies")->default(0)->unsigned();
            $table->integer("bathrooms")->unsigned();
            $table->string("phone")->nullable();
            $table->boolean("allowAnimals");
            $table->string("targetAudience");
            $table->string("billsIncluded");
            $table->timestamps();
        });
        Schema::table('republics', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
