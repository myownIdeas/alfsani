<?php

use Illuminate\Database\Seeder;

class HtmlStructureTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('html_structure')->insert([
            [ 'name' => 'textbox'],
            [ 'name' => 'selectbox'],
            [ 'name' => 'textarea'],
            [ 'name' => 'checkbox'],
            [ 'name' => 'radio'],
        ]);
    }
}
