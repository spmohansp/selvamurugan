<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizingBeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizing_beams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sizing_id')->unsigned();
            $table->foreign('sizing_id')->references('id')->on('sizings');
            $table->integer('warping_id')->unsigned()->nullable();
            $table->foreign('warping_id')->references('id')->on('warpings');
            $table->string('beam_number')->nullable();
            $table->string('gw')->nullable();
            $table->string('tw')->nullable();
            $table->string('nw')->nullable();
            $table->string('kuri')->nullable();
            $table->string('meter')->nullable();
            $table->string('kanchi')->nullable();
            $table->string('name')->nullable();
            $table->string('status')->default(0)->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('sub_customer_id')->unsigned()->nullable();
            $table->foreign('sub_customer_id')->references('id')->on('sub_customers');
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
        Schema::dropIfExists('sizing_beams');
    }
}
