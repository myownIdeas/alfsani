<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_discount',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->integer('school_id')->unsigned();

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
        Schema::drop('special_discount');
    }
}
