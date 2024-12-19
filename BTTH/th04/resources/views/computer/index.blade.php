@extends('layouts.header')

@section('title', 'Computers')

@section('content')
    <a href="{{ route('computers.create') }}" class="btn btn-primary">Create New Computer</a>
    <table class="table">
        <thead>
            <tr>
                <th>Computer name</th>
                <th>Model</th>
                <th>Operating system</th>
                <th>Processor</th>
                <th>Memory</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($computers as $computer)
                <tr>
                    <td>{{ $computer->computer_name }}</td>
                    <td>{{ $computer->model }}</td>
                    <td>{{ $computer->operating_system }}</td>
                    <td>{{ $computer->processor }}</td>
                    <td>{{ $computer->memory }}</td>
                    <td>
                        <a href="{{ route('computers.edit', ['id' => $computer->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('computers.destroy', ['id' => $computer->id]) }}" method="POST" style="display:inline;">
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
