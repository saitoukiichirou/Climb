<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('records_prices', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('record_id');
//            $table->foreign('record_id')->references('id')->on('records');
//            $table->unsignedBigInteger('price_id');
//            $table->foreign('price_id')->references('id')->on('prices');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records_prices');
    }
}
