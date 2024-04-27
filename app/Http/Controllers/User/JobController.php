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
        $jobs = $this->jobService->getJobs(['company']);

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
}
