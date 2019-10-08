<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_teachers',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('degrees');
            $table->string('image');
            $table->text('description');
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
        Schema::drop('school_teachers');
    }
}
