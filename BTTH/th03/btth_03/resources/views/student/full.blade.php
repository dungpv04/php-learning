@extends('layouts.test')

@section('title', 'Student')

@section('content')
    <a href="{{ route('students.create') }}" class="btn btn-primary">Create New Student</a>
    <table class="table">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Date of birth</th>
                <th>Parent phone</th>
                <th>Grade level</th>
                <th>Room number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->parent_phone }}</td>
                    <td>{{ $student->class->grade_level}}</td>
                    <td>{{ $student->class->room_number}}</td>
                    <td>
                        <a href="{{ route('students.edit', ['id' => $student->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', ['id' => $student->id]) }}" method="POST" style="display:inline;">
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
