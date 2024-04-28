@extends('app.layouts.main')
@section('contents')
    <div class="card flex-fill">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ $title }}</h5>

            <div class="text-end">
                <a href="/jobs/create" class="btn btn-primary text-white">New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Vacancies</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->company->name }}</td>
                        <td>{{ $job->vacancies }}</td>
                        <td>{{ showDateTime($job->deadline, 'd F, Y') }}</td>
                        <td>{{ \App\Enums\Job\Status::getName((int)$job->status) }}</td>
                        <td>
                            <a href="{{ route('jobs.edit', $job->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{  $jobs->links() }}
        </div>
    </div>
@endsection
