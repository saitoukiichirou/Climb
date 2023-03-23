<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string('dimension', 10);
            $table->string('grade', 10);
            $table->string('hold_color', 10);
            $table->string('tape_form', 10);
            $table->string('setter', 100)->nullable();
            $table->timestamps();
        });
    }

//リード用のマイグレーションコピペ用　あとで消す

//     public function up()
//         {
//             Schema::create('lead_problems', function (Blueprint $table) {
//                 $table->id();
//                 $table->string('grade', 10);
//                 $table->string('hold_color', 10);
//                 $table->string('tpo', 10)->nullable();
//                 $table->string('setter', 100)->nullable();
//                 $table->timestamps();
//             });
//         }

//
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problems');
    }
}
