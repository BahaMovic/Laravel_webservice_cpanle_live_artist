<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('notific_user', function (Blueprint $table) {
         $table->increments('id');

         $table->string('text');
         $table->integer('user_id')->unsigned();
         $table->foreign('user_id')->references('id')->on('users');

         $table->integer('order_id')->default('1')->unsigned();
         $table->foreign('order_id')->references('id')->on('orders');

         $table->integer('rate_id')->default('1')->unsigned();
         $table->foreign('rate_id')->references('id')->on('rate');

         $table->integer('provider_id')->unsigned();
         $table->foreign('provider_id')->references('id')->on('provider');
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
        Schema::dropIfExists('notific_user');
    }
}
