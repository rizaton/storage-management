<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oil_brands_data = json_decode(
            File::get("database/seeders/oil_data.json")
        );

        foreach ($oil_brands_data as $brand_key => $each_brand_data) {
            foreach ($each_brand_data->brand_products as $product) {
                Product::create([
                    'brand_id' => (((int) $brand_key) + 1),
                    'name' => $product->product_name,
                    'slug' => Str::slug($product->product_name),
                    'description' => $product->product_description,
                    'stock' => $product->product_stock,
                ]);
            }
        }
    }
}
