@extends('app.layouts.main')
@section('heading', 'Job Details')
@section('contents')
<section class="job section">
    <div class="row gy-5">
        <div class="col-lg-4 pe-lg-5">
            <div class="card p-4">
                <div class="title-area d-flex gap-3 mb-4">
                    <div class="title">
                        <h6>{{ $job->company->name }}</h6>
                        <small>{{ $job->location }}</small>
                    </div>
                </div>
                <ul class="job-desc-list mb-5 p-0 m-0">
                    <li><span>Job Title : </span><span>{{ $job->title }}</span></li>
                    <li><span>Vacancies : </span><span>{{ $job->vacancies }}</span></li>
                    <li><span>Salary : </span><span>{{ shortAmount($job->minimum_salary) }} {{ $job->currency }} - {{ shortAmount($job->maximum_salary) }} {{ $job->currency }}</span></li>
                    <li><span>Office Time : </span><span>{{ $job->office_time }}</span></li>
                    <li><span>Location : </span><span>{{ $job->location }}</span></li>
                    <li><span>Job Type : </span><span>{{ \App\Enums\Job\Type::getName($job->type) }}</span> <span class="badge badge-primary my-2">{{ $job->is_remote_allowed ? 'Remote': 'On-site'}}</span></li>
                    <li><span>Deadline : </span><span>{{ showDateTime($job->deadline, 'd F, Y') }}</span></li>
                </ul>

                <button class="btn btn-info text-white btn-md">Apply Now</button>

            </div>
        </div>
        <div class="col-lg-8">
            <div class="job-desc">
                <h4 class="mb-3">Description</h4>
                <p>@php echo $job->description @endphp</p>
                <h4 class="mb-3">Skills</h4>
                <ul class="skill-list mb-5">
                    @foreach($job->tags as $tag)
                        <li>{{ $tag->name }}</li>
                    @endforeach
                </ul>

                <h4 class="mb-3">Job Responsibility</h4>
                <ul class="responsibilities">
                    @php echo $job->requirement @endphp
                </ul>

                <h4 class="mb-3">Benefits</h4>
                <ul class="responsibilities">
                    @php echo $job->benefits @endphp
                </ul>
            </div>
        </div>
    </div>
</section>

<style>
    .job-desc-list li{
        margin-bottom: 15px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    .job-desc-list li span{
        display: inline-block;
    }
    .job-desc-list li span:first-child{
        font-weight: 500;
        color: #121212;
        min-width: 140px;
    }
    .job-desc-list li:last-child{
        margin-bottom: 0px;
    }
    .skill-list{
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
        list-style: none !important;

    }
    .skill-list li{
        padding: 5px 10px;
        border-radius: 20px;
        border: 1px solid #eee;
        color: #121212;
        font-weight: 500;
    }
    .responsibilities li{
        margin-bottom: 15px;
    }
</style>
@endsection
