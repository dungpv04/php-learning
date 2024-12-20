<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index(Request $request)
    {
        $computers = Computer::all();
        return view("computer.index", compact("computers"));
    }


    public function show($id)
    {
        $computer = Computer::findOrFail($id);
        return response()->json($computer);
    }

    public function store(Request $request)
    {
        $computer = Computer::create($request->all());
        return response()->json($computer, 201);
    }

    public function update(Request $request, $id)
    {
        $computer = Computer::findOrFail($id);
        $computer->update($request->all());
        return response()->json($computer, 200);
    }

    public function destroy($id)
    {
        Computer::destroy($id);
        return redirect()->route('computers.index')->with('success','');
    }
}
