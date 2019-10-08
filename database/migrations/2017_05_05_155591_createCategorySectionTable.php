<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorySectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_section',function(Blueprint $table){
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->foreign('section_id')
                ->references('id')->on('sections')
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
        Schema::drop('category_section');
    }
}
