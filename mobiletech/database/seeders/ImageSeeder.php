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

        $opened_phone_data_file = fopen('public/resources/mobily_data.csv','r');
        fgetcsv($opened_phone_data_file);

        for ($i = 0; $i < sizeof($product_ids); $i++){
            $phone_data = fgetcsv($opened_phone_data_file);

            Image::create([
                'product_id' => $product_ids[$i],
                'image_name' => $phone_data[10],
                'created_at' => now(),
                'updated_at' => now(),

            ]);

            Image::create([
                'product_id' => $product_ids[$i],
                'image_name' => "phone_default.png",
                'created_at' => now(),
                'updated_at' => now(),

            ]);

            Image::create([
                'product_id' => $product_ids[$i],
                'image_name' => "phone_2.png",
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }



    }
}
