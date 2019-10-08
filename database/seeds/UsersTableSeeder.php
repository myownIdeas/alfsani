<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
               'first_name' => $faker->name,
               'last_name' => $faker->name,
               'email' => $faker->unique()->safeEmail,
               'address' => $faker->address,
               'password'=>bcrypt('123'),
               'user_category_id'=>rand(1,2),
               'city_id' => 1,
               'meta_title'=>$faker->title,
               'meta_description'=>$faker->text,
               'experience'=>rand(1,10),
               'image'=>'Image not exist here ' ,
               'description'=> $faker->text,
               'rating'=>rand(1,10),
               'priority'=> rand(1,10),
               'is_featured'=> rand(0,1),
               'is_hot'=> rand(0,1),
               'is_active'=> rand(0,1),
               'access_token'=>($i == 1)?'$2y$10$o95CsuyVS19jCg6C.payUOSfbm4r.1opCk7QxozOn8eIO/6N0Zkvu':'',
           ];
       }

        DB::table('users')->insert($results);
    }
}
