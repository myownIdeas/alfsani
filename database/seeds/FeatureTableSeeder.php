<?php

use Illuminate\Database\Seeder;

class FeatureTableSeeder extends Seeder
{
    public function run(Faker\Generator $faker)
    {
        $features =[];
        for($i=0;$i<30;$i++){
            $features[] = [ 'html_id' => rand(1,5),'feature_name'=>preg_replace("/(\.\.\/)/","", $faker->century),'feature_label'=>preg_replace("/(\.\.\/)/","", $faker->city),'feature_value'=>preg_replace("/(\.\.\/)/","", $faker->city),'possible_values'=>'ground,middle,top','is_active'=>rand(0,1)];
        }
        DB::table('features')->insert($features);
    }
}
