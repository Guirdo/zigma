<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('days',50);
            $table->time('starthour',$precision=0);
            $table->time('finalhour');
            $table->date('firstdate');
            $table->foreignId('teacher_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreignId('course_id')->constrained();
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
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign('groups_teacher_id_foreign');
            $table->dropForeign('groups_course_id_foreign');
        });

        Schema::dropIfExists('groups');
    }
}
