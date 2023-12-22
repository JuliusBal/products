<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ManufacturerSeeder::class);
        Product::factory()->count(100)->create();
    }
}
