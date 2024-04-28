<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->delete();


        Image::create([
            'product_id' => 1,
            'name_hash' => 'phone_default.png',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        Image::create([
            'product_id' => 2,
            'name_hash' => 'phone_2.png',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        Image::create([
            'product_id' => 3,
            'name_hash' => 'phone_default.png',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

    }
}
