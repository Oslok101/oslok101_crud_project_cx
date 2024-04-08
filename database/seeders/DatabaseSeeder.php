<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(CategorySeeder::class);
        $this->command->info('CategorySeeder');
        $this->call(BranchSeeder::class);
        $this->command->info('BrachSeeder');
        $this->call(AdminSeeder::class);
        $this->command->info('AdminSeeder');
    }
}
