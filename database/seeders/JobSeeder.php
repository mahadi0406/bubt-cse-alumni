<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTitles = [
            'Software Engineer',
            'Web Developer',
            'Mobile App Developer',
            'Quality Assurance Engineer',
            'UI/UX Designer',
            'Database Administrator',
        ];

        $jobDescriptions = "As a Software Developer, you will be responsible for the development and maintenance of software applications. You'll work on building and optimizing websites, creating mobile applications for iOS and Android platforms, and designing user interfaces and experiences. Additionally, you'll be involved in testing software to ensure quality and reliability, as well as managing and optimizing databases for performance and reliability.";

        $jobRequirements = "Bachelor's degree in Computer Science or a related field.
            Proficiency in programming languages such as Java, Python, or JavaScript.
            Experience with frameworks like Laravel, React, or Angular.
            Strong problem-solving skills and attention to detail.
            Ability to work both independently and in a team environment.";

        foreach ($jobTitles as $index => $title) {
            Job::create([
                'company_id' => Company::pluck('id')->random(),
                'title' => $title,
                'description' => $jobDescriptions,
                'requirement' => $jobRequirements,
                'location' => 'Dhaka, Bangladesh',
                'is_remote_allowed' => fake()->boolean,
                'currency' => fake()->randomElement(['USD', 'EUR', 'BDT']),
                'minimum_salary' => fake()->numberBetween(30000, 80000),
                'maximum_salary' => fake()->numberBetween(80000, 150000),
                'vacancies' => rand(1, 5),
                'deadline' => now()->addMonths(1),
                'office_time' => 'Flexible',
                'benefits' => 'Health insurance, remote work options, competitive salary',
                'type' => \App\Enums\Job\Type::FULL_TIME->value,
                'status' => \App\Enums\Job\Status::PUBLISHED->value,
            ]);
        }
    }
}
