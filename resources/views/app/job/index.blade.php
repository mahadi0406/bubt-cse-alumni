@extends('app.layouts.main')
@section('contents')
    <div class="card flex-fill">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ $title }}</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{  $jobs->links() }}
        </div>
    </div>
@endsection
