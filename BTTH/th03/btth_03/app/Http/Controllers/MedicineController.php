<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view("medicine.index", compact("medicines"));
    }

    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        return response()->json($medicine);
    }

    public function store(Request $request)
    {
        $medicine = Medicine::create($request->all());
        return response()->json($medicine, 201);
    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);
        return view("medicine.edit", compact("medicine"));
    }

    public function destroy($id)
    {
        Medicine::destroy($id);
        return redirect()->route('medicines.index')->with('success','');
    }
}
