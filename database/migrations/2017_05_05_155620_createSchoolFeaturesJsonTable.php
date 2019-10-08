<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolFeaturesJsonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_features_json',function(Blueprint $table){
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->text('features');
            $table->text('modify_features');
            $table->nullableTimestamps();


            $table->foreign('school_id')
                ->references('id')
                ->on('schools')
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
        Schema::drop('school_features_json');
    }
}
