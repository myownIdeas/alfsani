<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorySectionAssignedFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_section_assigned_features',function(Blueprint $table){
            $table->increments('id');
            $table->integer('section_id')->unsigned();
            $table->integer('feature_id')->unsigned();
            $table->timestamps();


            $table->foreign('feature_id')
                ->references('id')
                ->on('features')
                ->onDelete('cascade');

            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
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
        Schema::drop('category_section_assigned_features');
    }
}
