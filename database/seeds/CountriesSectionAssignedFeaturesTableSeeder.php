<?php

use Illuminate\Database\Seeder;

class CountriesSectionAssignedFeaturesTableSeeder extends Seeder
{
    public $faker;
    public function __construct(){

    }
    public function run(Faker\Generator $faker)
    {
        DB::table('category_section_assigned_features')->insert([
            ['section_id'=>rand(1,2),'feature_id'=>1],
            ['section_id'=>rand(1,2),'feature_id'=>2],
            ['section_id'=>rand(1,2),'feature_id'=>3],
            ['section_id'=>rand(1,2),'feature_id'=>4],
            ['section_id'=>rand(1,2),'feature_id'=>5],
            ['section_id'=>rand(1,2),'feature_id'=>6],
            ['section_id'=>rand(1,2),'feature_id'=>7],
            ['section_id'=>rand(1,2),'feature_id'=>8],
            ['section_id'=>rand(1,2),'feature_id'=>9],
            ['section_id'=>rand(1,2),'feature_id'=>10],
            ['section_id'=>rand(1,2),'feature_id'=>11],
            ['section_id'=>rand(1,2),'feature_id'=>12],
            ['section_id'=>rand(1,2),'feature_id'=>13],
            ['section_id'=>rand(1,2),'feature_id'=>14],
            ['section_id'=>rand(1,2),'feature_id'=>15],
            ['section_id'=>rand(1,2),'feature_id'=>16],
            ['section_id'=>rand(1,2),'feature_id'=>17],
            ['section_id'=>rand(1,2),'feature_id'=>18],
            ['section_id'=>rand(1,2),'feature_id'=>19],
            ['section_id'=>rand(1,2),'feature_id'=>20],
            ['section_id'=>rand(1,2),'feature_id'=>21],
            ['section_id'=>rand(1,2),'feature_id'=>22],
            ['section_id'=>rand(1,2),'feature_id'=>23],
            ['section_id'=>rand(1,2),'feature_id'=>24],

        ]);
    }
}
