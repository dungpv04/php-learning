@extends('layouts.test')

@section('title', 'Class')

@section('content')
    <a href="{{ route('classes.create') }}" class="btn btn-primary">Create New Class</a>
    <table class="table">
        <thead>
            <tr>
                <th>Grade level</th>
                <th>Room number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>{{ $class->grade_level }}</td>
                    <td>{{ $class->room_number }}</td>
                    <td>
                        <a href="{{ route('classes.edit', ['id' => $class->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('classes.destroy', ['id' => $class->id]) }}" method="POST" style="display:inline;">
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
