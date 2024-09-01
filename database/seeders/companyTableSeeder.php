<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class companyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Integra Medical',
            'code' => '668d17bde1459',
            'description' => 'Integra Medical',
            'currency' => 'Dollar'
        ]);
        Company::create([
            'name' => 'Intra Trading & Contracting',
            'code' => '668d17dd7bb87',
            'description' => 'Intra Trading & Contracting',
            'currency' => 'Dollar'
        ]);
    }
}
