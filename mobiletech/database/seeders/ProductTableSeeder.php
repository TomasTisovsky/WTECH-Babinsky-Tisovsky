<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();



        $opened_phone_data_file = fopen('public/resources/mobily_data.csv','r');
        fgetcsv($opened_phone_data_file);
        while (($phone_data = fgetcsv($opened_phone_data_file)) !== false) {

            Product::create([
                'name' => $phone_data[0] . $phone_data[1],
                'description' =>$phone_data[11],
                'price' => $phone_data[2],
                'stock_quantity' => rand(1,200),
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ]);

        }

        // vytvorenie tabletov
        $opened_tablet_data_file = fopen('public/resources/tablety_data.csv','r');
        fgetcsv($opened_tablet_data_file);
        while (($tablet_data = fgetcsv($opened_tablet_data_file)) !== false) {

            Product::create([
                'name' => $tablet_data[0] . $tablet_data[1],
                'description' =>$tablet_data[11],
                'price' => $tablet_data[2],
                'stock_quantity' => rand(1,200),
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),

            ]);

        }


        // citanie CSVcka a vytvaranie Productov
        /*$opened_phone_data_file = fopen('storage/app/public/phones_data.csv','r');
        fgetcsv($opened_phone_data_file);
        while (($phone_data = fgetcsv($opened_phone_data_file)) !== false) {

            Product::create([
                'name' => $phone_data[1] . $phone_data[2],
                'description' => '6.1 LCD Liquid Retina 1792×828, procesor A12 Bionic, interná pamäť 64GB, fotoaparát zadný 12Mpx (F/1.8), fotoaparát predný 7Mpx (F/2.2), optická stabilizácia, GPS, Glonass, NFC, LTE, Lightning, Face ID, Dve SIM (nano-SIM a eSIM), vodoodolný podľa IP67,',
                'price' => $phone_data[5],
                'stock_quantity' => rand(1,200),
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ]);

        }*/
    }
}
