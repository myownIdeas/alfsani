<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
       DB::table('sections')->insert([
            [ 'name' => 'Near By','label'=>'Near By','priority'=>1],
            [ 'name' => 'Main ','label'=>'Main','priority'=>2],
        ]);
    }
}
