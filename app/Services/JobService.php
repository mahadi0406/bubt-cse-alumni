<?php

namespace App\Services;

use App\Enums\Job\Status;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Pagination\AbstractPaginator;

class JobService
{
    public function getJobs(): AbstractPaginator
    {
        return Job::latest()->paginate();
    }


    public function prepParams(JobRequest $request): array
    {
        return [
            'company_id' => $request->input('company_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'requirements' => $request->input('requirement'),
            'location' => $request->input('location'),
            'is_remote_allowed' => $request->has('is_remote_allowed'),
            'minimum_salary' => $request->input('minimum_salary'),
            'maximum_salary' => $request->input('maximum_salary'),
            'currency' => $request->input('currency'),
            'type' => $request->input('type'),
            'status' => Status::PENDING->value,
        ];
    }

    public function save(array $params): Job
    {
        return Job::create($params);
    }



}
