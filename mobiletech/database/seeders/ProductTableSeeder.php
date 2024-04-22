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

        Product::create([
            'name' => 'Apple iPhone XR 64GB Blue - Trieda C',
            'description' => '6.1 LCD Liquid Retina 1792×828, procesor A12 Bionic, interná pamäť 64GB, fotoaparát zadný 12Mpx (F/1.8), fotoaparát predný 7Mpx (F/2.2), optická stabilizácia, GPS, Glonass, NFC, LTE, Lightning, Face ID, Dve SIM (nano-SIM a eSIM), vodoodolný podľa IP67,',
            'price' => 499.99,
            'stock_quantity' => 10,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        
        ]);
        Product::create([
            'name' => 'Honor 9 4GB/64GB Dual SIM Glacier Gray Šedý - Trieda C',
            'description' => '6.1 LCD Liquid Retina 1792×828, procesor A12 Bionic, interná pamäť 64GB, fotoaparát zadný 12Mpx (F/1.8), fotoaparát predný 7Mpx (F/2.2), optická stabilizácia, GPS, Glonass, NFC, LTE, Lightning, Face ID, Dve SIM (nano-SIM a eSIM), vodoodolný podľa IP67,',
            'price' => 499.99,
            'stock_quantity' => 10,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        
        ]);
        Product::create([
            'name' => 'Motorola Edge 50 Pro 12GB/512GB Čierna',
            'description' => '6.1 LCD Liquid Retina 1792×828, procesor A12 Bionic, interná pamäť 64GB, fotoaparát zadný 12Mpx (F/1.8), fotoaparát predný 7Mpx (F/2.2), optická stabilizácia, GPS, Glonass, NFC, LTE, Lightning, Face ID, Dve SIM (nano-SIM a eSIM), vodoodolný podľa IP67,',
            'price' => 499.99,
            'stock_quantity' => 10,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        
        ]);
    }
}
