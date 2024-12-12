@extends('layouts.test')

@section('title', 'Medicines')

@section('content')
    <a href="{{ route('medicines.create') }}" class="btn btn-primary">Create New Medicine</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Dosage</th>
                <th>Form</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicines as $medicine)
                <tr>
                    <td>{{ $medicine->name }}</td>
                    <td>{{ $medicine->brand }}</td>
                    <td>{{ $medicine->dosage }}</td>
                    <td>{{ $medicine->form }}</td>
                    <td>{{ $medicine->price }}</td>
                    <td>{{ $medicine->stock }}</td>
                    <td>
                        <a href="{{ route('medicines.edit', ['id' => $medicine->medicine_id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('medicines.destroy', ['id' => $medicine->medicine_id]) }}" method="POST" style="display:inline;">
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
