<?php

namespace App\Services;

use App\Models\Job;
use Illuminate\Pagination\AbstractPaginator;

class JobService
{
    public function getJobs(): AbstractPaginator
    {
        return Job::latest()->paginate();
    }


}
