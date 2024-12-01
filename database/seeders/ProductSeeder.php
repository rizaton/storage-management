<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $raw_json = File::get("database/seeders/oil_data.json");

        $oil_brands_data = json_decode($raw_json);

        foreach ($oil_brands_data as $brand_key => $each_brand_data) {
            foreach ($each_brand_data->brand_products as $product) {
                Product::create([
                    'brand_id' => (((int) $brand_key) + 1),
                    'name' => $product->product_name,
                    'description' => $product->product_description,
                    'stock' => $product->product_stock,
                ]);
            }
        }
    }
}
