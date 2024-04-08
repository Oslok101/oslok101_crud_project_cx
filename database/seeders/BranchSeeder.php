<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name' => 'Cuernavaca',
        ]);

        Branch::create([
            'name' => 'Yautepec',
        ]);

        Branch::create([
            'name' => 'Cuautla',

        ]);

        Branch::create([
            'name' => 'Acapulco',
        ]);

        
    }
}
