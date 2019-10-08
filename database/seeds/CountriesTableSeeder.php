<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
        $results = [ 'name' => 'pakistan'];
        DB::table('countries')->insert($results);
    }
}
