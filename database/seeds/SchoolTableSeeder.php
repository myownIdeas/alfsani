<?php

use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    public function run(Faker\Generator $faker)
    {
        $features =[];
      for($a=0;$a<5;$a++) {
          for ($i = 0; $i < 1; $i++) {
              $features[] = [
                  'name' => $faker->name,
                  'address' => $faker->address,
                  'phone' => $faker->phoneNumber,
                  'cell' => $faker->phoneNumber,
                  'school_condition' => 'perfect',
                  'class_rooms' => rand(1, 10),
                  'total_teachers' => rand(1, 10),
                  'is_trusted' => rand(0, 1),
                  'is_discount' => rand(0, 1),
                  'user_id' => 1,
                  'country_id' => 1,
                  'city_id' => 1,
                  'is_active' => rand(0, 1),
                  'society_id' => 1,
                  'description' => $faker->text,
                  'created_at' => $faker->date('Y-m-d'),
                  'category_id' => rand(1, 2),
                  'official_email' => $faker->email,
                  'views' => $faker->randomDigit,
                  'meta_title' => $faker->title,
                  'meta_description' => $faker->text,
                  'features' => $faker->text
              ];
          }
      }
        //dd($features);

        DB::table('schools')->insert($features);
    }
}
