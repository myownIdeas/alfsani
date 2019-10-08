<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees',function(Blueprint $table){
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->string('fee');
            $table->string('discount');
            $table->string('after_discount');

            $table->timestamps();

            $table->foreign('class_id')
                ->references('id')->on('class')
                ->onDelete('cascade');

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
        Schema::drop('fees');
    }
}
