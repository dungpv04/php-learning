@extends('layouts.test')

@section('title', 'Edit Medicine')

@section('content')
    <form action="{{ route('medicines.update', $medicine->medicine_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $medicine->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
