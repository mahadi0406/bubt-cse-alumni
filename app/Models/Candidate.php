<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'expected_salary',
        'expected_salary_currency',
        'resume_link',
        'github_link',
        'portfolio_link',
        'status'
    ];

}
