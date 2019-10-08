<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createOldResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_results',function(Blueprint $table){
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->string('class_name');
            $table->string('roll_number');
            $table->string('number');
            $table->string('image');
            $table->timestamps();

            $table->foreign('school_id')
                ->references('id')->on('schools')
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
        Schema::drop('old_results');
    }
}
