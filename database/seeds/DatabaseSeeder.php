<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(SocietiesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoriesSectionTableSeeder::class);
        $this->call(UserCategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SchoolConditionTableSeeder::class);
        $this->call(UsersRecordsTableSeeder::class);
        $this->call(HtmlStructureTableSeeder::class);
        $this->call(FeatureTableSeeder::class);
        $this->call(CountriesSectionAssignedFeaturesTableSeeder::class);
        $this->call(SchoolTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);

    }
}
