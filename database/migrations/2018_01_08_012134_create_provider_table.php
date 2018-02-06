<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider', function (Blueprint $table) {
            $table->increments('id');     
   
              
            
            $table->string('fullName');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('tradeName');
            $table->string('phone')->unique();
            $table->integer('servicetype_id')->unsigned();
            $table->foreign('servicetype_id')->references('id')->on('servicetype');  
            $table->string('lat');
            $table->string('long');
            $table->text('about');
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
        Schema::dropIfExists('provider');
    }
}
