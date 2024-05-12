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
        $opened_phone_data_file = fopen('public/resources/mobily_data.csv','r');

        // prvy riadok v csv su nazvy stlpcov
        fgetcsv($opened_phone_data_file);

        for($pid =1; $pid<=30;$pid++){

            $phone_data = fgetcsv($opened_phone_data_file);

            //znacka
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[0],
                'sub_category_parameter_id' => 1,
            ]);

            //model
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[1],
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
                'value' => $phone_data[4],
                'sub_category_parameter_id' => 12,
            ]);

            //farba
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[8],
                'sub_category_parameter_id' => 4,
            ]);


            //velkost operacnej pamate
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[6],
                'sub_category_parameter_id' => 10,
            ]);

            //velkost internej pamate
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[7],
                'sub_category_parameter_id' => 11,
            ]);

            //kapacita baterie
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[5],
                'sub_category_parameter_id' => 9,
            ]);


        }

        // parametre pre tablety
        // otvorenie CSV suboru
        $opened_tablet_data_file = fopen('public/resources/tablety_data.csv', 'r');

        // prvy riadok v csv su nazvy stlpcov
        fgetcsv($opened_tablet_data_file);

        for ($pid = 31; $pid <= 34; $pid++) {

            $phone_data = fgetcsv($opened_tablet_data_file);

            //znacka
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[0],
                'sub_category_parameter_id' => 1,
            ]);

            //model
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[1],
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
                'value' => $phone_data[4],
                'sub_category_parameter_id' => 12,
            ]);

            //farba
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[8],
                'sub_category_parameter_id' => 4,
            ]);


            //velkost operacnej pamate
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[6],
                'sub_category_parameter_id' => 10,
            ]);

            //velkost internej pamate
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[7],
                'sub_category_parameter_id' => 11,
            ]);

            //kapacita baterie
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[5],
                'sub_category_parameter_id' => 9,
            ]);
        }

        // parametre pre skla
        // otvorenie CSV suboru
        $opened_glass_data_file = fopen('public/resources/skla_data.csv','r');

        // prvy riadok v csv su nazvy stlpcov
        fgetcsv($opened_glass_data_file);

        for($pid =35; $pid<=38;$pid++) {

            $phone_data = fgetcsv($opened_glass_data_file);

            //znacka
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[0],
                'sub_category_parameter_id' => 1,
            ]);

            //model
            ProductParameter::create([
                'product_id' => $pid,
                'value' => $phone_data[1],
                'sub_category_parameter_id' => 3,
            ]);

        }
    }
}
