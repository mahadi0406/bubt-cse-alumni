<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.partials.head')
    <style>
        .list-none{
            list-style: none !important;
        }
        .h-100vh{
            height: 100vh;
        }

        .event-list li{
            display: flex;
            justify-content: start;
            align-items: center;
        }
        .event-list li span{
            display: inline-block;
        }
        .event-list li span:first-child{
            min-width: 100px;
        }
    </style>
</head>

<body>
<div class="wrapper">
    @include('app.partials.nav')
    <div class="main">
        @include('app.partials.top')
        <section class="py-5 h-100vh">
            <div class="container">
                @foreach($events as $event)
                    <div class="card p-lg-5 p-4 border-danger">
                        <div class="row gy-4">
                            <div class="col-lg-3">
                                <ul class="event-list">
                                    <li class="mb-2"><span class="fw-bold">Date: </span><span>{{ showDateTime($event->date_time, 'd F, Y') }}</span></li>
                                    <li class="mb-2"><span class="fw-bold">Time: </span><span>{{ showDateTime($event->date_time, 'H:i:s') }}</span></li>
                                    <li><span class="fw-bold">Location: </span><span>{{ $event->location }}</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-9">
                                <h4 class="mb-3 lh-1">{{ $event->name }}</h4>
                                <p class="mb-4">{{ $event->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach($jobs as $job)
                    <div class="row mb-4 shadow-lg">
                        <div class="col-lg-6 p-3">
                            <h5>{{ $job->title }}</h5>
                            <ul class="p-0 m-0 d-flex align-items-center gap-3 list-none">
                                <li>{{ $job->company->name }}</li>
                                <li>{{ $job->location }}</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 p-3 border-end">
                            <p>{{ showDateTime($job->deadline, 'd F, Y') }}</p>
                            <small>No of vacancies: {{ $job->vacancies }}</small>
                        </div>
                        <div class="col-lg-3 p-3 border-end text-center">
                            <a href="{{ route('job.detail', $job->id) }}" class="btn btn-md btn-info text-white">Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        @include('app.partials.footer')
    </div>
</div>
@include('app.partials.scripts')
</body>
</html>
