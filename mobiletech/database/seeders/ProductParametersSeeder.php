<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductParameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductParametersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ziskanie idciek produktov
        $product_ids = Product::pluck('id');


        // otvorenie CSV suboru
        $opened_phone_data_file = fopen('storage/app/public/phones_data.csv','r');


        fgetcsv($opened_phone_data_file);

        foreach ($product_ids as $pid){

            $phone_data = fgetcsv($opened_phone_data_file);

            //znacka
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[1],
                'sub_category_parameter_id' => 1,
            ]);

            //model
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[2],
                'sub_category_parameter_id' => 3,
            ]);

            //operacny system
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[3],
                'sub_category_parameter_id' => 7,
            ]);

            //velkost obrazovky
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[9],
                'sub_category_parameter_id' => 12,
            ]);

            //velkost operacnej pamate
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[10],
                'sub_category_parameter_id' => 10,
            ]);

            //kapacita baterie
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[11],
                'sub_category_parameter_id' => 9,
            ]);

        }
    }
}
