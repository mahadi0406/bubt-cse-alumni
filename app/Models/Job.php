<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'requirements',
        'location',
        'is_remote_allowed',
        'minimum_salary',
        'maximum_salary',
        'currency',
        'type',
        'status',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_tags');
    }
}
