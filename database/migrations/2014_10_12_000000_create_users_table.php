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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('usertype_id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        /*
        Schema::table('users', function($table) {
            $table->foreign('usertype_id')->references('id')->on('user_types')->cascade();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_idtipousuario_foreign');
        });*/

        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        
        Schema::dropIfExists('users');
    }
}
