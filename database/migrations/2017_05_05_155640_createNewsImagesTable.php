<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_images',function(Blueprint $table){
            $table->increments('id');
            $table->integer('news_id')->unsigned();
            $table->string('image');
            $table->timestamps();


            $table->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news_images');
    }
}
