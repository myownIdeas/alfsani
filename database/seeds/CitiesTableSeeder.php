<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
        $results = [
               'name' => 'lahore',
                'country_id'=>1
           ];

        DB::table('cities')->insert($results);
    }
}
