<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'name' => 'Tech Summit Bangladesh 2024',
                'description' => 'Annual technology summit bringing together industry leaders and innovators.',
                'date_time' => '2024-07-20 10:00:00',
                'location' => 'Bangabandhu International Conference Center, Dhaka',
                'total_seats' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AI Workshop: Exploring Emerging Trends',
                'description' => 'A workshop focusing on artificial intelligence and its applications in various industries.',
                'date_time' => '2024-08-15 14:00:00',
                'location' => 'Bangladesh University of Business and Technology (BUBT), Dhaka',
                'total_seats' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
