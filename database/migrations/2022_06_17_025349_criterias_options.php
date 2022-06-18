<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriteriasOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_option',function(Blueprint $table){
            $table->id();
            $table->foreignId('criteria_id')->references('id')->on('criteria')->onDelete('cascade');
            $table->string('name');
            $table->enum('klasifikasi',['sangat rendah','rendah','sedang','tinggi','sangat tinggi']);
            $table->decimal('value');
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
        Schema::dropIfExists('criteria_option');
    }
}
