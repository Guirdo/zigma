<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('concept',140);
            $table->decimal('amount');
            $table->decimal('surcharge');
            $table->foreignId('concept_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('group_id')->nullable()->constrained();
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
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('payments_student_id_foreign');
            $table->dropForeign('payments_group_id_foreign');
            $table->dropForeign('payments_concept_id_foreign');
        });

        Schema::dropIfExists('payments');
    }
}
