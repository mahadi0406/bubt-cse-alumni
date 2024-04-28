<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $jobs = Job::all();
        $tags = Tag::all();
        foreach ($jobs as $job) {
            $randomTags = $tags->shuffle()->take(rand(1, 3));
            foreach ($randomTags as $tag) {
                $job->tags()->attach($tag->id);
            }
        }
    }
}
