@extends('layouts.test')

@section('title', 'Create Medicine')

@section('content')
    <form action="{{ route('medicines.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
