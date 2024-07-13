<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CompanySeeder::class,
            UserSeeder::class,
        ]);

        if (!app()->environment('production')) {
            $this->call([
                EventSeeder::class,
                TagSeeder::class,
                JobSeeder::class,
                JobTagSeeder::class,
            ]);
        }
    }
}
