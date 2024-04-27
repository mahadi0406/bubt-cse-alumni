<?php

namespace App\Services;

use App\Enums\Job\Status;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Arr;

class JobService
{

    public function __construct(protected TagService $tagService)
    {

    }
    public function getJobs(int|string $userId = null, array $with = []): AbstractPaginator
    {
        $query = Job::query();

        if(!empty($with)){
            $query->with($with);
        }

        return $query->latest()->paginate();
    }


    public function prepParams(JobRequest $request): array
    {
        return [
            'user_id' => auth_user()->id,
            'company_id' => $request->input('company_id'),
            'title' => $request->input('title'),
            'tags' => $request->input('skills'),
            'description' => $request->input('description'),
            'requirement' => $request->input('requirement'),
            'location' => $request->input('location'),
            'is_remote_allowed' => $request->has('is_remote_allowed'),
            'minimum_salary' => $request->input('minimum_salary'),
            'maximum_salary' => $request->input('maximum_salary'),
            'currency' => $request->input('currency'),
            'type' => $request->input('type'),
            'vacancies' => $request->input('vacancies'),
            'deadline' => $request->input('deadline'),
            'office_time' => $request->input('office_time'),
            'benefits' => $request->input('benefits'),
            'status' => Status::PUBLISHED->value,
        ];
    }

    public function save(array $params): Job
    {
        $job = Job::create($params);


        if(!blank(Arr::get($params, 'tags'))){
            $job->tags()->attach($this->tagService->saveTags(Arr::get($params, 'tags')));
        }

        return $job;
    }

    public function update(Job $job, array $params): Job
    {
        $job->update($params);

        if(!blank(Arr::get($params, 'tags'))){
            $job->tags()->attach($this->tagService->saveTags(Arr::get($params, 'tags')));
        }

        return $job;
    }


    public function findById(string|int $id): ?Job
    {
        return Job::find($id);
    }


}
