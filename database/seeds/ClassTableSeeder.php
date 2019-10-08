<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
        $results = [
            [3,'play Group'],[3,'kg'],[3,'prep'],[3,'1'],[3,'2'],[3,'3'],[3,'4'],[3,'5'],[3,'6'],[3,'7'],[3,'8'],[3,'9'],[3,'10'],
            [2,'first Year'],
            [2,'second Year'],
            [2,'third Year'],
            [2,'bsc'],
            [2,'msc'],
            [2,'mscs'],
            [2,'mscs'],
        ];


        DB::table('class')->insert($results);
    }
}
