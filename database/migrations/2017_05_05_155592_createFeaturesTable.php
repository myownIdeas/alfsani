<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features',function(Blueprint $table){
            $table->increments('id');
            $table->integer('html_id')->unsigned();
            $table->string('feature_name');
            $table->string('feature_value');
            $table->string('feature_label');
            $table->string('possible_values');
            $table->integer('is_active');

            $table->timestamps();


            $table->foreign('html_id')
                ->references('id')
                ->on('html_structure')
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
        Schema::drop('features');
    }
}
