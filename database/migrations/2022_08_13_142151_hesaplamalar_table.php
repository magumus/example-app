<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HesaplamalarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hesaplamalar', function (Blueprint $table) {
            $table->bigIncrements('hesaplama_id');
            $table->integer('yil');
            $table->integer('yakit_id');
            $table->double('yakit_miktari');
            $table->integer('birim_id');
            $table->double('co2');
            $table->double('ch4');
            $table->double('n20');
            $table->double('co2e');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hesaplamalar');
    }
}
