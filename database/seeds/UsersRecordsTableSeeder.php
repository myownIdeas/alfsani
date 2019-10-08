<?php

use Illuminate\Database\Seeder;

class UsersRecordsTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {

        $results = [];
       for($i=0;$i<10;$i++)
       {
           $results[] = [
               'user_id' => rand(1,8),
               'degree_name' => $faker->name,
               'degree_description' => $faker->text(),
           ];
       }

        DB::table('users_records')->insert($results);
    }
}
