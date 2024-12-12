@extends('layouts.test')

@section('title', 'Student')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Date of birth</th>
                <th>Parent phone</th>
                <th>Grade level</th>
                <th>Room number</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
