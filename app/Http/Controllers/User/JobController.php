<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Services\CompanyService;
use App\Services\JobService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    public function __construct(
        protected JobService $jobService,
        protected CompanyService $companyService
    ){

    }

    public function index(): View
    {
        $title = "Manage Jobs";
        $jobs = $this->jobService->getJobs(with:['company', 'tags']);

        return view('app.job.index', compact('title', 'jobs'));
    }


    public function create(): View
    {
        $title = "Create Job";
        $companies = $this->companyService->getCompany();

        return view('app.job.create', compact('title', 'companies'));
    }

    public function store(JobRequest $request): RedirectResponse
    {
        $this->jobService->save($this->jobService->prepParams($request));
        return redirect()->route('jobs.create')->with('success', 'Job created successfully!');
    }

    public function edit(int|string $id): View
    {
        $title = "Update Job";
        $companies = $this->companyService->getCompany();
        $job = $this->jobService->findById($id);

        if(!$job || $job->user_id != auth_user()->id){
            abort(404);
        }

        return view('app.job.edit', compact('title', 'companies', 'job'));
    }

    public function update(JobRequest $request, int|string $id): RedirectResponse
    {
        $job = $this->jobService->findById($id);

        if (!$job){
            abort(404);
        }

        $this->jobService->update($job, $this->jobService->prepParams($request));

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }
}
