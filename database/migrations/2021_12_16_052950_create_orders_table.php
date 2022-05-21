<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->date('date');
            $table->string('time');
            $table->string('how_many_peoples');
            $table->foreignId('ordered_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('resturant_owner')->references('id')->on('users')->onDelete('cascade');

            $table->string('description');
            $table->integer('is_closed');
            $table->foreignId('order_resturant_id')->references('resturant_id')->on('resturants')->onDelete('cascade');
            
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
        Schema::dropIfExists('orders');
    }
}
