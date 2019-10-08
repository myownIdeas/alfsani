<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    public function run(Faker\Generator $faker)
    {
        $features =[];
        for($i=0;$i<30;$i++){
            $features[] = [
                'title'=>$faker->name,
                'description'=>$faker->address,
                'views'=>$faker->randomDigit,
                'meta_title'=>$faker->title,
                'meta_description'=>$faker->text,
                'is_active'=>rand(0,1),
                'created_at'=>$faker->date('Y-m-d'),
            ];
        }

        DB::table('news')->insert($features);
    }
}
