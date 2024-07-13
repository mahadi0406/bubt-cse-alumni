<?php

namespace App\Services;

use App\Enums\Job\Status;
use App\Models\Candidate;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CandidateService
{
    public function prepParams(Request $request, Job $job): array
    {
        $resumeLink = null;

        if ($request->hasFile('resume')){
            $name = time() . '_'. Str::random(8) . '.' . $request->file('resume')->getClientOriginalExtension();
            $request->file('resume')->storeAs('resume', $name);
            $resumeLink = 'resume/' . $name;
        }

        return [
            'job_id' => $job->id,
            'user_id' => auth_user()->id,
            'expected_salary' => $request->input('expected_salary'),
            'resume_link' => $resumeLink,
            'github_link' => null,
            'portfolio_link' => null,
        ];
    }

    public function save(array $params): Candidate
    {
        return Candidate::create($params);
    }


}
