<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('names')->nullable();
            $table->string('surnames')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('expire',5);
            $table->string('avatar',45);
            $table->string('phone');
            $table->text('address');
            $table->integer('rol_id')->nullable();
            $table->integer('pagination')->nullable();
            $table->rememberToken()->nullable();
            $table->integer('status_id');
            $table->integer('users_id');
            $table->integer('users_id_update')->nullable();
            $table->integer('users_id_delete')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
