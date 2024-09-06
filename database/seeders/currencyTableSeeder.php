<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class currencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::create([
            'name' => 'Dollar',
            'code' => 'USD',
            'isDefault' => '0',
            // 'conversion_factor' => '3.22',
            'isActive' => '1',
        ]);

        Currency::create([
            'name' => 'Rupee',
            'code' => 'INR',
            'isDefault' => '0',
            // 'conversion_factor' => '273.87',
            'isActive' => '1',
        ]);

        Currency::create([
            'name' => 'Kuwaiti Dinar',
            'code' => 'KWD',
            'isDefault' => '1',
            // 'conversion_factor' => '1',
            'isActive' => '1',
        ]);
    }
}
