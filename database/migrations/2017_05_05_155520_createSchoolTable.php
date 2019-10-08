<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('address');

            $table->string('phone');
            $table->string('cell');

            $table->string('school_condition');
            $table->integer('class_rooms');



            $table->integer('is_trusted');


            $table->integer('is_discount');
            $table->integer('total_teachers');
            $table->string('official_email');
            $table->integer('is_active');
            $table->integer('is_featured')->default(0);
            $table->integer('is_hot')->default(0);
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('society_id')->unsigned();
            $table->integer('views');
            $table->text('description');
            $table->text('features');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->timestamps();



            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade');


            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');

            $table->foreign('society_id')
                ->references('id')->on('societies')
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
        Schema::drop('schools');
    }
}
