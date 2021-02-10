<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('lastname',50);
            $table->enum('gender',['FEMALE','MALE','NON-BINARY']);
            $table->string('email',255);
            $table->text('address');
            $table->string('phonenumber',10);
            $table->unsignedBigInteger('employeetype_id');
            $table->text('url_photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('employees');
    }
}
