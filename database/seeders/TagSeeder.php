<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Software Development',
            'Web Development',
            'Mobile App Development',
            'UI/UX Design',
            'Quality Assurance',
            'Database Administration',
            'Backend Development',
            'Frontend Development',
            'Full Stack Development',
            'Agile Methodologies',
            'Scrum',
            'DevOps',
            'Cloud Computing',
            'Artificial Intelligence',
            'Machine Learning',
        ];

        foreach ($tags as $tagName) {
            Tag::create([
                'name' => $tagName,
                'slug' => \Illuminate\Support\Str::slug($tagName),
            ]);
        }
    }
}
