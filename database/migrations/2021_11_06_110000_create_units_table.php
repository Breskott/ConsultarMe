<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('description', 120);
            $table->string('phone', 45);
            $table->string('zip_code', 11);
            $table->string('address');
            $table->string('number', 45);
            $table->string('distric');
            $table->bigInteger('city_id')->unsigned();
            $table->string('complement', 150)->nullable();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
