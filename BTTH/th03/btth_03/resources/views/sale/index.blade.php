@extends('layouts.test')

@section('title', 'Sales')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Quantity</th>
                <th>Sale Date</th>
                <th>Customer phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->sale_date}}</td>
                    <td>{{ $sale->customer_phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
