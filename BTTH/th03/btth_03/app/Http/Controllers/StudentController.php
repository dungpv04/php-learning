<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::with('class')->get();
        if ($request->query('relation') === 'full') {
            return view('student.full', compact('students'));
        }
        return view('student.index', compact('students'));
    }

    public function show($id)
    {
        $student = Student::with('classes')->findOrFail($id);
        return response()->json($student);
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return response()->json($student, 200);
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('students.index')->with('success','');
    }
}
