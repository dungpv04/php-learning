@extends('layouts.header')

@section('title', 'Issues')

@section('content')
    <a href="{{ route('issues.create') }}" class="btn btn-primary mb-3">Add Issue</a>
    <table class="table">
        <thead>
            <tr>
                <th>Issue ID</th>
                <th>Computer name</th>
                <th>Model</th>
                <th>Reported by</th>
                <th>Reported date</th>
                <th>Urgency</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td>{{ $issue->id }}</td>
                    <td>{{ $issue->computer->computer_name }}</td>
                    <td>{{ $issue->computer->model }}</td>
                    <td>{{ $issue->reported_by }}</td>
                    <td>{{ $issue->reported_date }}</td>
                    <td>{{ $issue->urgency }}</td>
                    <td>{{ $issue->status }}</td>
                    <td>
                        <a href="{{ route('issues.edit', ['id' => $issue->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('issues.destroy', ['id' => $issue->id]) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $issues->links('pagination::bootstrap-4') }}
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this issue?');
        }
    </script>
@endsection
