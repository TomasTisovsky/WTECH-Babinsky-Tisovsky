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

        // ziskanie idciek produktov
        $product_ids = Product::pluck('id');

        // dostupne obrazky
        $images = ['phone_default.png', 'phone_2.png'];


        // jeden obrazok pre kazdy produkt
        foreach ($product_ids as $pid){
            Image::create([
                'product_id' => $pid,
                'name_hash' => $images[array_rand($images)],
                'created_at' => now(),
                'updated_at' => now(),

            ]);

            Image::create([
                'product_id' => $pid,
                'name_hash' => "phone_default.png",
                'created_at' => now(),
                'updated_at' => now(),

            ]);

            Image::create([
                'product_id' => $pid,
                'name_hash' => "phone_2.png",
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }

    }
}
