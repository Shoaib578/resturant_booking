<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturant_week_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('monday')->nullable();
            $table->integer('tuesday')->nullable();
            $table->integer('wednesday')->nullable();
            $table->integer('thursday')->nullable();
            $table->integer('friday')->nullable();
            $table->integer('saturday')->nullable();
            $table->integer('sunday')->nullable();


            $table->string('sunday_opening_time')->nullable();
            $table->string('sunday_closing_time')->nullable();



            $table->string('monday_opening_time')->nullable();
            $table->string('monday_closing_time')->nullable();



            $table->string('tuesday_opening_time')->nullable();
            $table->string('tuesday_closing_time')->nullable();


           


            $table->string('wednesday_opening_time')->nullable();
            $table->string('wednesday_closing_time')->nullable();


            $table->string('thursday_opening_time')->nullable();
            $table->string('thursday_closing_time')->nullable();


            $table->string('friday_opening_time')->nullable();
            $table->string('friday_closing_time')->nullable();

            $table->string('saturday_opening_time')->nullable();
            $table->string('saturday_closing_time')->nullable();

            $table->foreignId('resturant_id')->references('resturant_id')->on('resturants')->onDelete('cascade');
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
        Schema::dropIfExists('resturant_week_schedules');
    }
};
