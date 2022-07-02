<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlternativeValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative_value',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('alternative_id')->index()->nullable();
            $table->unsignedBigInteger('criteria_id')->index()->nullable();
            $table->unsignedBigInteger('criteria_option_id')->index()->nullable();
            $table->decimal('weight');   
            $table->decimal('value');
            $table->timestamps();

            // foreign
            $table->foreign('alternative_id')->references('id')->on('alternative')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('criteria_id')->references('id')->on('criteria')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('criteria_option_id')->references('id')->on('criteria_option')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternative_value');

    }
}
