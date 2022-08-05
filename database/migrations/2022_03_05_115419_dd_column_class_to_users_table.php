<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DdColumnClassToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('users', function (Blueprint $table) {
////            $table->tinyInteger('class_name')->after('birthday');
//            $table->string('member_number', 10)->nullable()->after('id');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('users', function (Blueprint $table) {
////            $table->dropColumn('class_name');
//            $table->dropColumn('member_number');
//        });
    }
}
