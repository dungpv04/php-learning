@extends('layouts.header')

@section('title', 'Edit Issue')

@section('content')
    <form action="{{ route('issues.update', ['id' => $issue->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="computer_id">Computer name</label>
            <select class="form-control" id="computer_id" name="computer_id" required>
                @foreach ($computers as $computer)
                    <option value="{{$computer->id}}" {{ $issue->computer->id === $computer->id ? 'selected' : '' }}>{{$computer->computer_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="reported_by">Reported By</label>
            <input type="text" value="{{ $issue->reported_by }}" class="form-control" id="reported_by" name="reported_by" required>
        </div>
        <div class="form-group">
            <label for="reported_date">Reported Date</label>
            <input type="datetime-local" value="{{ $issue->reported_date }}" class="form-control" id="reported_date" name="reported_date" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $issue->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="urgency">Urgency</label>
            <select class="form-control" id="urgency" name="urgency" required>
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="In progress" {{ $issue->status == 'In progress' ? 'selected' : '' }}>In progress</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
