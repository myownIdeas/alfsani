<?php

use Illuminate\Database\Seeder;

class UserCategoriesTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
       DB::table('user_categories')->insert([
            [ 'name' => 'owner','label'=>'Owner'],
            [ 'name' => 'teacher','label'=>'Teacher'],
            [ 'name' => 'tutor','label'=>'Tutor']
        ]);
    }
}
