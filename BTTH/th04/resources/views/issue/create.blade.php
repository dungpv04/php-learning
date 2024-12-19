@extends('layouts.header')

@section('title', 'Create Issue')

@section('content')
    <form action="{{ route('issues.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="computer_id">Computer name</label>
            <select class="form-control" id="computer_id" name="computer_id" required>
                @foreach ($computers as $computer)
                    <option value="{{$computer->id}}">{{$computer->computer_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="reported_by">Reported By</label>
            <input type="text" class="form-control" id="reported_by" name="reported_by" required>
        </div>
        <div class="form-group">
            <label for="reported_date">Reported Date</label>
            <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="urgency">Urgency</label>
            <select class="form-control" id="urgency" name="urgency" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Open">Open</option>
                <option value="In progress">In progress</option>
                <option value="Resolved">Resolved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
