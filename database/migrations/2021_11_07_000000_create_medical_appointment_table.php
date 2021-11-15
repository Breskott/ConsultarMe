<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_appointment', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('patient_id')->unsigned();
            $table->bigInteger('exam_speciality_id')->unsigned();
            $table->bigInteger('doctor_id')->unsigned();
            $table->string('tab_number', 45);
            $table->dateTime('tab_datetime');
            $table->dateTime('schedule_datetime')->nullable();
            $table->char('tab_central_vacancy', 1);
            $table->text('comments')->nullable();
            $table->text('files')->nullable();

            $table->foreign('patient_id')->references('id')->on('users');

            $table->foreign('exam_speciality_id')->references('id')->on('exam_specialty');

            $table->foreign('doctor_id')->references('id')->on('doctors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_appointment');
    }
}
