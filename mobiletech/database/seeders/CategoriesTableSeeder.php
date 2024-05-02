<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the previous categories to avoid duplicates
        DB::table('categories')->delete();

        // Insert new categories
        DB::table('categories')->insert([
            ['category_name' => 'Mobilné telefóny'],
            ['category_name' => 'Tablety'],
            ['category_name' => 'Sklá a fólie'],
            ['category_name' => 'Príslušenstvo'],
            ['category_name' => 'Kryty a obaly'],
        ]);
    }
}
