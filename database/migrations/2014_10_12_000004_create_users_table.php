<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');            
            //Foreign key
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('role')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table->unsignedBigInteger('estate_id');
            $table->foreign('estate_id')->references('id')->on('estate')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('city')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
