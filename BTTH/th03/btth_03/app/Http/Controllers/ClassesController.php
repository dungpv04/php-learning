<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view("class.index", compact("classes"));
    }

    public function show($id)
    {
        $class = Classes::findOrFail($id);
        return response()->json($class);
    }

    public function store(Request $request)
    {
        $class = Classes::create($request->all());
        return response()->json($class, 201);
    }

    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);
        $class->update($request->all());
        return response()->json($class, 200);
    }

    public function destroy($id)
    {
        Classes::destroy($id);
        return redirect()->route('classes.index')->with('success','');
    }
}
