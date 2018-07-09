<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->string('code');
            $table->unique('code');

            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts');


            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('store_warehouse', function (Blueprint $table) {
            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores');

            $table->integer('warehouse_id')->unsigned();
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->unsignedMediumInteger('type')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('warehouses');
        Schema::drop('store_warehouse');
    }
}
