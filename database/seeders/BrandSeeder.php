<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oil_brands_data = json_decode(
            File::get("database/seeders/oil_data.json")
        );

        foreach ($oil_brands_data as $each_brand_data) {
            Brand::create([
                'name' => $each_brand_data->brand_name,
                'slug' => Str::slug($each_brand_data->brand_name),
            ]);
        }
    }
}
