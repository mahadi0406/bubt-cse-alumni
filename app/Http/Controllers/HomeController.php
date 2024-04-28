<?php

namespace App\Http\Controllers;

use App\Services\MemberService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(protected MemberService $memberService)
    {

    }

    public function index(): View
    {
        \request()->validate([
            'identity' => 'nullable|string|max:255',
        ]);

        $identity = false;

        if (\request()->query('identity')) {
            $identity = $this->memberService->identityChecker(\request()->query('identity'));
        }

        return view('home', compact('identity'));
    }

}
