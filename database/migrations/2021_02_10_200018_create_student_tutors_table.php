<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tutors', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained();
            $table->foreignId('tutor_id')->constrained();
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
        Schema::table('student_tutors', function (Blueprint $table) {
            $table->dropForeign('student_tutors_student_id_foreign');
            $table->dropForeign('student_tutors_tutor_id_foreign');
        });

        Schema::dropIfExists('student_tutors');
    }
}
