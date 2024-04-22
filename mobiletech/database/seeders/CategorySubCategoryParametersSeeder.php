<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySubCategoryParametersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Optional: Clear previous data from tables
        DB::table('sub_category_parameters')->truncate();
        DB::table('sub_categories')->truncate();
        DB::table('categories')->truncate();
     



        // Define categories
        $categories = [
            'Mobilné telefóny' => [
                'Subcategories' => [
                    'Všeobecné' => [
                        'Parameters' => ['Značka', 'Séria', 'Model','Farba'],
                    ],
                    'Hardvér a softvér' => [
                        'Parameters' => ['CPU', 'Počet jadier procesora', 'Operačný systém'],
                    ],
                    'Batéria' => [
                        'Parameters' => ['Typ batérie', 'Kapacita batérie'],
                    ],
                    'Pamäť' => [
                        'Parameters' => ['Operačná pamäť', 'Interná pamäť'],
                    ],
                    'Displej' => [
                        'Parameters' => ['Veľkosť displeja', 'Rozlíšenie displeja'],
                    ],
                    'Rozmery a hmotnosť' => [
                        'Parameters' => ['Výška', 'Šírka', 'Hrúbka','Hmotnosť'],
                    ],
                    'Fotoaparát' => [
                        'Parameters' => ['Rozlíšenie predného fotoaparátu', 'Rozlíšenie zadného fotoaparátu', 'Počet zadných objektívov','Počet predných objektívov'],
                    ],
                    'Funkcie' => [
                        'Parameters' => [
                            [
                                'name' => 'Audio jack', 'options'=> ['Áno','Nie'],
                            ],
                            [
                                'name' => 'NFC', 'options'=> ['Áno','Nie'],
                            ],
                            [
                                'name'=> 'single/dualSim', 'options'=> ['Single','dualSim'],
                            ]
                        ],
                    ],
                ],
            ],
            'Tablety' => [
                'Subcategories' => [
                    'Všeobecné' => [
                        'Parameters' => ['Značka', 'Séria', 'Model','Farba'],
                    ],
                    'Hardvér a softvér' => [
                        'Parameters' => ['CPU', 'Počet jadier procesora', 'Operačný systém'],
                    ],
                    'Batéria' => [
                        'Parameters' => ['Typ batérie', 'Kapacita batérie'],
                    ],
                    'Pamäť' => [
                        'Parameters' => ['Operačná pamäť', 'Interná pamäť'],
                    ],
                    'Displej' => [
                        'Parameters' => ['Veľkosť displeja', 'Rozlíšenie displeja'],
                    ],
                    'Rozmery a hmotnosť' => [
                        'Parameters' => ['Výška', 'Šírka', 'Hrúbka','Hmotnosť'],
                    ],
                    'Fotoaparát' => [
                        'Parameters' => ['Rozlíšenie predného fotoaparátu', 'Rozlíšenie zadného fotoaparátu', 'Počet zadných objektívov','Počet predných objektívov'],
                    ],
                    'Funkcie' => [
                        'Parameters' => [
                            [
                                'name' => 'Audio jack', 'options'=> ['Áno','Nie'],
                            ],
                            [
                                'name' => 'NFC', 'options'=> ['Áno','Nie'],
                            ],
                        ],
                    ],
                ],
            ],
            'Sklá a fólie' => [
                'Subcategories' => [
                    'Všeobecné' => [
                        'Parameters' => ['Značka', 'Model','Typ fólie/skla','Druh produktu','Vhodne pre'],
                    ],
                ],
            ],
            'Príslušenstvo' => [
                'Subcategories' => [
                    'Všeobecné' => [
                        'Parameters' => ['Značka', 'Farba','Model','Druh produktu','Mikrofón','Vhodne pre','Dĺžka kábla','Typ konektoru','Druh nabíjačky','Typ slúchadiel','Kapacita batérie slúchadiel'],
                    ],
                ],
            ],
            'Kryty a obaly' => [
                'Subcategories' => [
                    'Všeobecné' => [
                        'Parameters' => ['Značka', 'Model','Druh produktu','Typ púzdra','Farba','Materiál','Vhodne pre'],
                    ],
                ],
            ],
        ];



        foreach ($categories as $categoryName => $sub) {
            $categoryId = DB::table('categories')->insertGetId([
                'category_name' => $categoryName,
            ]);

            foreach ($sub['Subcategories'] as $subcategoryName => $subSub) {
                $subcategoryId = DB::table('sub_categories')->insertGetId([
                    'sub_category_name' => $subcategoryName,
                    'category_id' => $categoryId,
                ]);

                foreach ($subSub['Parameters'] as $parameter) {
                    if (is_array($parameter)) {
                        $parameterName = $parameter['name'];
                        $options = $parameter['options'];
                        // Insert options into a new table or handle them as needed
                    } else {
                        $parameterName = $parameter;
                        $options = null;
                    }
        
                    DB::table('sub_category_parameters')->insert([
                        'name' => $parameterName,
                        'sub_category_id' => $subcategoryId,
                        'options' => $options ? json_encode($options) : null,     
                    ]);
                }
            }
        }
    }
}
