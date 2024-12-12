@extends('layouts.test')

@section('title', 'Issues')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Computer name</th>
                <th>Model</th>
                <th>Operating system</th>
                <th>Processor</th>
                <th>Memory</th>
                <th>Reported by</th>
                <th>Reported date</th>
                <th>Description</th>
                <th>Urgency</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td>{{ $issue->computer->computer_name }}</td>
                    <td>{{ $issue->computer->model }}</td>
                    <td>{{ $issue->computer->operating_system }}</td>
                    <td>{{ $issue->computer->processor }}</td>
                    <td>{{ $issue->computer->memory }}</td>
                    <td>{{ $issue->reported_by}}</td>
                    <td>{{ $issue->reported_date }}</td>
                    <td>{{ $issue->description }}</td>
                    <td>{{ $issue->urgency }}</td>
                    <td>{{ $issue->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
