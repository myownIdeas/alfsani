<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news',function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->integer('views');
            $table->string('description');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->integer('is_active');

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
        Schema::drop('news');
    }
}
