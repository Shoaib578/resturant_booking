<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturants', function (Blueprint $table) {
            $table->id('resturant_id');
            $table->string('resturant_name');
            $table->string('address');
            $table->string('opening_time');
            $table->string('closing_time');
            $table->date('opening_date')->nullable();
            $table->date('closing_date')->nullable();

            $table->string('image');

            $table->integer('is_closed');

            $table->foreignId('resturant_belong_to')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('resturants');
    }
}
