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
            $table->foreignId('alternative_id')->references('id')->on('alternative');
            $table->foreignId('criteria_id')->references('id')->on('criteria');
            $table->foreignId('criteria_option_id')->references('id')->on('criteria_option');
            $table->decimal('weight');
            $table->bigInteger('value');
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
        Schema::dropIfExists('alternative_value');

    }
}
