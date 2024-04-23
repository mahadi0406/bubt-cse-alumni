<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\JobService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    public function __construct(protected  JobService  $jobService){

    }

    public function index(): View
    {
        $title = "Manage Jobs";
        $jobs = $this->jobService->getJobs();

        return view('app.job.index', compact('title', 'jobs'));
    }


    public function create(): View
    {
        $title = "Create Job";
        return view('app.job.create', compact('title'));
    }
}
