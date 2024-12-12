@extends('layouts.test')

@section('title', 'Sales')

@section('content')
    <a href="{{ route('sales.create') }}" class="btn btn-primary">Create New Sale</a>
    <table class="table">
        <thead>
            <tr>
                <th>Medicine name</th>
                <th>Brand</th>
                <th>Dosage</th>
                <th>Form</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Quantity</th>
                <th>Sale date</th>
                <th>Customer phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->medicine->name}}</td>
                    <td>{{$sale->medicine->brand}}</td>
                    <td>{{$sale->medicine->dosage}}</td>
                    <td>{{$sale->medicine->form}}</td>
                    <td>{{$sale->medicine->price}}</td>
                    <td>{{$sale->medicine->stock}}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->sale_date }}</td>
                    <td>{{ $sale->customer_phone }}</td>
                    <td>
                        <a href="{{ route('sales.edit', ['id' => $sale->sale_id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sales.destroy', ['id' => $sale->sale_id]) }}" method="POST" style="display:inline;">
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
