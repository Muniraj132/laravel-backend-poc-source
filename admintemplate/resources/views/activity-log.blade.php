@extends('layouts.app')

@section('title', 'Activity Log')

@section('contents')

    <div class="mb-3">
        <a href="{{ route('export.pdf') }}" class="btn btn-primary">Export as PDF</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Login Time</th>
                <th>Logout Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activityLogs as $index => $activityLog)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $activityLog->user->name }}</td>
                    <td>{{ $activityLog->user->email }}</td>
                    <td>{{ $activityLog->login_time }}</td>
                    <td>{{ $activityLog->logout_time }}</td>
                    <td>
                        <form action="{{ route('delete.activity-log', $activityLog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
