<?php

namespace App\Http\Controllers\User;

use App\Enums\ContentType;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Jobs\SendNotificationJob;
use App\Services\CandidateService;
use App\Services\CompanyService;
use App\Services\ContentService;
use App\Services\JobService;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class JobController extends Controller
{
    public function __construct(
        protected JobService $jobService,
        protected CompanyService $companyService,
        protected TagService $tagService,
        protected CandidateService $candidateService,
        protected ContentService $contentService
    ){

    }

    public function index(): View
    {
        $title = "Manage Jobs";
        $jobs = $this->jobService->getJobs(auth_user()->id, ['company', 'tags']);

        return view('app.job.index', compact('title', 'jobs'));
    }

    public function create(): View
    {
        $title = "Create Job";
        $companies = $this->companyService->getCompany();
        $tags = $this->tagService->getTags();

        return view('app.job.create', compact('title', 'companies', 'tags'));
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
        $tags = $this->tagService->getTags();

        if(!$job || $job->user_id != auth_user()->id){
            abort(404);
        }

        return view('app.job.edit', compact('title', 'companies', 'job', 'tags'));
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

    public function apply(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => ['required', Rule::exists('jobs', 'id')],
            'expected_salary' => ['required', 'numeric', 'min:0', 'max:99999999'],
            'resume' => ['required', 'file', 'mimes:pdf,doc', 'max:10240'],
        ]);

        $job = $this->jobService->findById($request->input('id'));

        if (!$job){
           abort(404);
        }

        $subject = 'Job Application';
        $candidate = $this->candidateService->save($this->candidateService->prepParams($request, $job));
        $content = $this->contentService->getContent(ContentType::JOB_APPLY,['amount' => shortAmount($candidate->expected_salary)]);

        SendNotificationJob::dispatch([
                'email' => $candidate->user->email,
                'phone' => $candidate->user->mobile
            ],$subject,$content, $candidate->resume_link
        );

        return back()->with('success', 'Thank you for applying for this job!');
    }
}
