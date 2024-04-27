<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'currency',
        'minimum_salary',
        'maximum_salary',
        'vacancies',
        'deadline',
        'office_time',
        'benefits',
        'type',
        'status',
    ];

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'job_tags');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
