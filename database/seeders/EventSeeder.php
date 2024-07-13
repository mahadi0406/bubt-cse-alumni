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
                'name' => 'AI Workshop: Exploring Emerging Trends',
                'description' => 'Annual technology summit, a pivotal gathering where industry luminaries, forward-thinking innovators, and passionate enthusiasts converge to exchange insights, explore emerging trends, and collectively propel the boundaries of technological advancement. It serves as a dynamic platform for fostering collaboration, nurturing talent, and catalyzing impactful initiatives that shape the future landscape of innovation.',
                'date_time' => '2024-08-15 14:00:00',
                'location' => 'Bangladesh University of Business and Technology (BUBT), Dhaka',
                'total_seats' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
