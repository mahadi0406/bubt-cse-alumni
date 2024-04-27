<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Str;

class TagService
{
    public function prepParams(string $tag): array
    {
        return [
            'name' => $tag,
            'slug' => Str::slug($tag),
        ];
    }

    public function findBySlug(string $slug)
    {
        return Tag::where('slug', $slug)->first();
    }

    public function saveTags(array $tags): array
    {
        $ids = [];

        foreach ($tags as $value) {
            $tag = $this->findBySlug(Str::slug($value));

            if (!$tag){
                $tag = Tag::create($this->prepParams($value));
            }

            $ids[] = $tag->id;
        }

        return $ids;
    }


}
