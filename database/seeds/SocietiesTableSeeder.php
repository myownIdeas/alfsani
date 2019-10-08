<?php

use Illuminate\Database\Seeder;

class SocietiesTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
        $results = ['name' => $faker->name,'city_id' => 1];
        DB::table('societies')->insert($results);
    }
}
