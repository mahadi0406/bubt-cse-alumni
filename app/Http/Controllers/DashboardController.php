<?php

namespace App\Http\Controllers;

use App\Enums\MemberRequestStatus;
use App\Enums\MsgType;
use App\Models\MemberRequest;
use App\Services\EventService;
use App\Services\JobService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function __construct(
        protected UserService $user,
        protected JobService $jobService,
        protected EventService $eventService
    )
    {}

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $users = $this->user->adminGetAllUser();
        $jobs = $this->jobService->getJobs(with: ['company']);
        $events = $this->eventService->getEvents();

        return view('dashboard', compact('users', 'jobs', 'events'));
    }

    public function jobDetail(string|int $id): View
    {
        $job = $this->jobService->findById($id);

        return view('app.job.details', compact('job'));

    }

    public function getMemberRequests(Request $request): \Illuminate\View\View
    {
        $members = MemberRequest::select('id', 'name', 'mobile', 'status', 'intake', 'shift')
            ->where('referer_id', auth_user()->id)
            ->whereIn('status', [MemberRequestStatus::pending, MemberRequestStatus::referer_accepted, MemberRequestStatus::referer_declined])
            ->get();

        return \view('app.member.requests', compact('members'));
    }

    public function getReferral(): \Illuminate\View\View
    {
        return \view('app.member.referral');
    }

    public function refererChangeStatusPage(Request $request, $id, $status)
    {
        $member = MemberRequest::findOrFail($id);
        if ($member->referer_id != auth_user()->id) {
            return \redirect()->back()->with(msg('You are not authorized to change this request status.', MsgType::error));
        }

        $classes = [
            'accept' => 'success',
            'decline' => 'danger',
        ];

        $class = $classes[$status];

        return \view('app.member.status-change', compact('member', 'status', 'class'));
    }

    public function refererChangeStatus(Request $request, $id, $status)
    {
        $data = $this->validate($request, [
            'referer_note' => 'required',
        ]);

        $member = MemberRequest::findOrFail($id);
        if ($member->referer_id != auth_user()->id) {
            return \redirect()->back()->with(msg('You are not authorized to change this request status.', MsgType::error));
        }

        if ($member->status == MemberRequestStatus::approved->value || $member->status == MemberRequestStatus::declined->value) {
            return \redirect()->back()->with(msg('Unauthorized access!', MsgType::error));
        }

        $statues = [
            'accept' => MemberRequestStatus::referer_accepted->value,
            'decline' => MemberRequestStatus::declined->value
        ];

        $member->status = $statues[$status];
        $member->referer_note = $data['referer_note'];

        $member->save();

        return redirect()->route('members.request')->with(msg('Request '. $status . ' successfully.', MsgType::success));

    }
}
