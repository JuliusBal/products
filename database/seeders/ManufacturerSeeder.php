<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    public function run(): void
    {
        $manufacturers = ['RIMI', 'MAXIMA', 'PIGU.LT', 'Senukai', 'LIDL'];
        collect($manufacturers)->each(fn ($name) => Manufacturer::firstOrCreate(['name' => $name]));
    }
}
