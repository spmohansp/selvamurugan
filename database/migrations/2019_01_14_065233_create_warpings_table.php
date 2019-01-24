<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarpingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warpings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('sub_customer_id')->unsigned()->nullable();
            $table->foreign('sub_customer_id')->references('id')->on('sub_customers');
            $table->string('date')->nullable();
            $table->string('set_number')->nullable();
            $table->string('yarn_count')->nullable();
            $table->string('ilai')->nullable();
            $table->string('rewainding_weight')->nullable();
            $table->string('baby_cone_weight')->nullable();
            $table->string('company_id_1')->nullable();
            $table->string('total_bag1')->nullable();
            $table->string('total_kg_bag1')->nullable();
            $table->string('company_id_2')->nullable();
            $table->string('total_bag2')->nullable();
            $table->string('total_kg_bag2')->nullable();
            $table->string('total_weight')->nullable();
            $table->string('net_weight')->nullable();
            $table->longText('warping')->nullable();
            $table->string('remaining_cone_weight')->nullable();
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
        Schema::dropIfExists('warpings');
    }
}
