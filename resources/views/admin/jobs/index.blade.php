@extends('admin.master')
@section('content')

    <h2 class="mt-5">All Jobs</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Duration</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->price }}$</td>
                <td>{{ $job->duration }}</td>
                <td>{{ $job->user->name }}</td>
                <td>
                    <a onclick="return confirm('Are you sure?!')" href="{{ route('admin.jobs_delete', $job->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    @if ($job->status == 'waiting-admin-approval')
                        <a href="{{ route('admin.jobs_update', [$job->id, 'open']) }}" class="btn btn-primary btn-sm">Approve</a>
                    @else
                        <a href="{{ route('admin.jobs_update', [$job->id, 'waiting-admin-approval']) }}" class="btn btn-dark btn-sm">Deny</a>
                    @endif
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6">No Jobs Found</td>
                </tr>
            @endforelse


        </tbody>
    </table>

@stop
