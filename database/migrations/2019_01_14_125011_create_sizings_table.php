<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warping_id')->unsigned();
            $table->foreign('warping_id')->references('id')->on('warpings');
            $table->string('date')->nullable();
            $table->string('lab_length')->nullable();
            $table->string('palsekaram')->nullable();
            $table->string('warp_weight')->nullable();
            $table->string('note')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sizings');
    }
}
