<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $sales = Sale::with('medicine')->get();
        if ($request->query('relation') === 'full') {
            return view('sale.full', compact('sales'));
        }
        return view('sale.index', compact('sales'));
    }

    public function show($id)
    {
        $sale = Sale::with('medicine')->findOrFail($id);
        return response()->json($sale);
    }

    public function store(Request $request)
    {
        $sale = Sale::create($request->all());
        return response()->json($sale, 201);
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->update($request->all());
        return response()->json($sale, 200);
    }

    public function destroy($id)
    {
        Sale::destroy($id);
        return redirect()->route('sales.index')->with('success','');
    }
}
