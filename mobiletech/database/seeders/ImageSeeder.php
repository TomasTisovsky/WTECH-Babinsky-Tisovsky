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

        for ($i = 1; $i <= 30; $i++){
            $phone_data = fgetcsv($opened_phone_data_file);

            Image::create([
                'product_id' => $i,
                'image_name' => $phone_data[10],
                'created_at' => now(),
                'updated_at' => now(),

            ]);

            Image::create([
                'product_id' => $i,
                'image_name' => "phone_default.png",
                'created_at' => now(),
                'updated_at' => now(),

            ]);

            Image::create([
                'product_id' => $i,
                'image_name' => "phone_2.png",
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }


        // obrazky pre tablety
        $opened_tablet_data_file = fopen('public/resources/tablety_data.csv','r');
        fgetcsv($opened_tablet_data_file);

        for ($i = 31; $i <= 34; $i++){
            $phone_data = fgetcsv($opened_tablet_data_file);

            Image::create([
                'product_id' => $i,
                'image_name' => $phone_data[10],
                'created_at' => now(),
                'updated_at' => now(),

            ]);

            /*Image::create([
                'product_id' => $i,
                'image_name' => "phone_default.png",
                'created_at' => now(),
                'updated_at' => now(),

            ]);*/

        }

        // obrazky pre skla
        $opened_glass_data_file = fopen('public/resources/skla_data.csv','r');
        fgetcsv($opened_glass_data_file);
        for ($i = 35; $i <= 38; $i++){
            $phone_data = fgetcsv($opened_glass_data_file);

            Image::create([
                'product_id' => $i,
                'image_name' => $phone_data[3],
                'created_at' => now(),
                'updated_at' => now(),

            ]);

        }

        // obrazky pre prislusenstvo
        $opened_acc_data_file = fopen('public/resources/prislusenstvo_data.csv','r');
        fgetcsv($opened_acc_data_file);
        for ($i = 39; $i <= 42; $i++){
            $phone_data = fgetcsv($opened_acc_data_file);

            Image::create([
                'product_id' => $i,
                'image_name' => $phone_data[4],
                'created_at' => now(),
                'updated_at' => now(),

            ]);



        }

        // obrazky pre obaly
        $opened_acc_data_file = fopen('public/resources/obaly_data.csv','r');
        fgetcsv($opened_acc_data_file);
        for ($i = 43; $i <= 46; $i++){
            $phone_data = fgetcsv($opened_acc_data_file);

            Image::create([
                'product_id' => $i,
                'image_name' => $phone_data[4],
                'created_at' => now(),
                'updated_at' => now(),

            ]);



        }


    }
}
