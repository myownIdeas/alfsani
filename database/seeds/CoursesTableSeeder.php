<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
        $results = [
              ['name'=>'prep'],
              ['name'=>'kg'],
              ['name'=>'1'],
              ['name'=>'2'],
              ['name'=>'3'],
              ['name'=>'4'],
              ['name'=>'5'],
              ['name'=>'6'],
              ['name'=>'7'],
              ['name'=>'8'],
              ['name'=>'9'],
              ['name'=>'10'],
              ['name'=>'BSC'],
              ['name'=>'MSC'],
              ['name'=>'MIT'],
              ['name'=>'MSCS'],
              ['name'=>'BA'],
              ['name'=>'FA'],
              ['name'=>'MA English'],
              ['name'=>'b.com'],
              ['name'=>'m.com'],
              ['name'=>'PHD'],
           ];

        DB::table('courses')->insert($results);
    }
}
