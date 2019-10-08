<?php

use Illuminate\Database\Seeder;

class CategoriesSectionTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run()
    {
       DB::table('category_section')->insert([
            [ 'category_id' =>1 ,'section_id'=>1],
           [ 'category_id' =>2 ,'section_id'=>1],
           [ 'category_id' =>3 ,'section_id'=>2],
           [ 'category_id' =>4 ,'section_id'=>1],

        ]);
    }
}
