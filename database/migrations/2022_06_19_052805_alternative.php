<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alternative extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative',function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->bigInteger("NIK");
            $table->string('name');
            $table->string('address');
            $table->enum('gender',['pria','wanita']);
            $table->string('foto');
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
        Schema::dropIfExists('alternative');
    }
}
