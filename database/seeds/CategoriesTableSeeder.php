<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
       DB::table('categories')->insert([
            [ 'name' => 'university','label'=>'University'],
            [ 'name' => 'collage','label'=>'Collage'],
            [ 'name' => 'school','label'=>'School'],
            [ 'name' => 'academy','label'=>'Academy']
        ]);
    }
}
