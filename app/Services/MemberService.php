<?php

namespace App\Services;

use App\Models\MemberRequest;

class MemberService
{
    public function identityChecker(string $identity): bool
    {
        return MemberRequest::where('name', $identity)
            ->orWhere('email', $identity)
            ->orWhere('mobile', $identity)
            ->exists();
    }

}
