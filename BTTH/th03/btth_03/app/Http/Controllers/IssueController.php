<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index(Request $request)
    {
        $issues = Issue::with('computer')->get();
        if ($request->query('relation') === 'full') {
            return view('issue.full', compact('issues'));
        }
        return view('issue.index', compact('issues'));
    }

    public function show($id)
    {
        $issue = Issue::with('computer')->findOrFail($id);
        return response()->json($issue);
    }

    public function store(Request $request)
    {
        $issue = Issue::create($request->all());
        return response()->json($issue, 201);
    }

    public function update(Request $request, $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->update($request->all());
        return response()->json($issue, 200);
    }

    public function destroy($id)
    {
        Issue::destroy($id);
        return redirect()->route('issues.index')->with('success','');
    }
}
