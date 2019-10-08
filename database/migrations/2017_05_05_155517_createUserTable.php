<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $table){
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
//            $table->integer('school_id');
            $table->integer('user_category_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('experience')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('rating')->nullable();
            $table->string('priority')->nullable();
            $table->string('access_token')->nullable();
            $table->string('address')->nullable();
            $table->integer('is_featured')->default(0);
            $table->integer('is_hot')->default(0);
            $table->integer('is_active')->default(0);
            $table->string('meta_title');
            $table->string('meta_description');
            $table->timestamps();

             $table->foreign('user_category_id')
                ->references('id')->on('user_categories')
                ->onDelete('cascade');

            $table->foreign('city_id')
                ->references('id')->on('cities')
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
        Schema::drop('users');
    }
}
