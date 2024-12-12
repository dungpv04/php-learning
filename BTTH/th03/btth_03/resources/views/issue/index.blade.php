@extends('layouts.test')

@section('title', 'Issues')

@section('content')
    <a href="{{ route('issues.create') }}" class="btn btn-primary">Create New Issue</a>
    <table class="table">
        <thead>
            <tr>
                <th>Reported by</th>
                <th>Reported date</th>
                <th>Description</th>
                <th>Urgency</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td>{{ $issue->reported_by}}</td>
                    <td>{{ $issue->reported_date }}</td>
                    <td>{{ $issue->description }}</td>
                    <td>{{ $issue->urgency }}</td>
                    <td>{{ $issue->status }}</td>
                    <td>
                        <a href="{{ route('issues.edit', ['id' => $issue->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('issues.destroy', ['id' => $issue->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
