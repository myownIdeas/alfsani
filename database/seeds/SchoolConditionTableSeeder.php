<?php

use Illuminate\Database\Seeder;

class SchoolConditionTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
        $results = [
            ['name'=>'perfect','label'=>'Perfect'],
            ['name'=>'medium','label'=>'Medium'],
            ['name'=>'low','label'=>'Low']
        ];
        DB::table('school_condition')->insert($results);
    }
}
