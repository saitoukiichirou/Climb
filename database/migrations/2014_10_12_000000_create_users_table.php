<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('member_number', 10);
            $table->string('name', 100);
            $table->string('kana', 100)->nullable();
            $table->tinyInteger('gender');
            $table->date('birthday');
            $table->tinyInteger('class')->nullable();
            $table->string('address', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100);//->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
