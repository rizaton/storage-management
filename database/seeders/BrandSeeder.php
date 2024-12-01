<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $raw_json = File::get("database/seeders/oil_data.json");
        $oil_brands_data = json_decode($raw_json);

        foreach ($oil_brands_data as $each_brand_data) {
            Brand::create([
                'name' => $each_brand_data->brand_name,
            ]);
        }
    }
}
