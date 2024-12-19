<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index(Request $request)
    {
        $issues = Issue::with('computer')->paginate(5);
        if ($request->query('relation') === 'full') {
            return view('issue.full', compact('issues'));
        }
        return view('issue.index', compact('issues'));
    }

    public function create(){
        $computers= Computer::all();
        return view("issue.create", compact('computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reported_by' => 'required|max:100',
            'reported_date' => 'required|date',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In progress,Resolved',
            'computer_id' => 'required',
            'description' => 'required|max:500'
        ]);

        Issue::create($request->all());
        return redirect()->route("issues.index")->with('success', 'added issue');
    }
    
    public function edit($id){
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issue.edit', compact('issue', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reported_by' => 'required|max:100',
            'reported_date' => 'required|date',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In progress,Resolved',
            'computer_id' => 'required',
            'description' => 'required|max:500'
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($request->all());
        return redirect()->route('issues.index')->with('success', 'updated');
    }

    public function destroy($id)
    {
        Issue::destroy($id);
        return redirect()->route('issues.index')->with('success','');
    }
}
