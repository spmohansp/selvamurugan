<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarpingYarnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warping_yarns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warping_id')->unsigned();
            $table->foreign('warping_id')->references('id')->on('warpings');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('yarn_count')->nullable();
            $table->string('total_bag')->nullable();
            $table->string('total_kg_bag')->nullable();
            $table->string('total_kg')->nullable();
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
        Schema::dropIfExists('warping_yarns');
    }
}
