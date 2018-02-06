<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders', function (Blueprint $table) {
          $table->increments('id');
          $table->string('total');
          $table->integer('active');
          $table->integer('old_date');
          $table->date('date');
          $table->string('time');
          $table->string('address');
          $table->string('disc_code');
          $table->integer('provider_id')->unsigned();
          $table->foreign('provider_id')->references('id')->on('provider');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
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
