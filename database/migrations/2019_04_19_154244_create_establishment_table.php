<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablishmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->unsignedBigInteger('estate_id');
            $table->foreign('estate_id')->references('id')->on('estate')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('city')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('establishment');
    }
}
