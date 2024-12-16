<?php

namespace App\Http\Controllers;

use App\Models\GroupLoan;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupLoanController extends Controller
{
    // Display a list of all group loans
    public function index()
    {
        $groupLoans = GroupLoan::with('group')->get();
        return view('grouploans.index', compact('groupLoans'));
    }

    // Show the form to create a new group loan
    public function create()
    {
        $groups = Group::all();
        return view('grouploan.create', compact('groups'));
    }
    public function getGroupLeader($groupId)
    {
        $group = Group::find($groupId);
        if ($group) {
            return response()->json([
                'leader_name' => $group->group_leadername,
                'leader_number' => $group->group_leadernumber
            ]);
        }
        return response()->json(['error' => 'Group not found'], 404);
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        // Directly create a new group loan without validation
        GroupLoan::create([
            'group_id'          => $request->group_id,
            'leader_name'       => $request->leader_name,
            'leader_number'     => $request->leader_number,
            'teamlead_name'     => $request->teamlead_name,
            'teamlead_number'   => $request->teamlead_number,
            'totalgroup_member' => $request->totalgroup_member,
            'loan_amount'       => $request->loan_amount,
            'intrest_rate'      => $request->intrest_rate,
            'type'              => $request->type,
            'collected_amount'  => $request->collected_amount,
            'duration'          => $request->duration,
            'disburse_rate'     => $request->disburse_rate,
            'agent_id'          => $request->agent_id,
            
        ]);
        // dd("Agent");
        // Return the same view with success message
        return redirect()->back()->with('success', 'Group created successfully.');
    }
    

    // Display a specific group loan
    public function show(GroupLoan $groupLoan)
    {
        return view('grouploans.show', compact('groupLoan'));
    }

    // Show the form to edit an existing group loan
    public function edit(GroupLoan $groupLoan)
    {
        $groups = Group::all();
        return view('grouploans.edit', compact('groupLoan', 'groups'));
    }

    // Update an existing group loan in the database
    public function update(Request $request, GroupLoan $groupLoan)
    {
        $request->validate([
            'group_id' => 'required|exists:groups,id',
            'leader_name' => 'required|string|max:255',
            'leader_number' => 'required|string|max:15',
            'teamlead_name' => 'required|string|max:255',
            'teamlead_number' => 'required|string|max:15',
            'total_group_members' => 'required|integer|min:1',
            'loan_amount' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0|max:100',
            'type' => 'required|string|max:255',
            'collected_amount' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
            'disburse_rate' => 'required|numeric|min:0|max:100',
            'agent_id' => 'nullable|integer',
        ]);

        $groupLoan->update($request->all());

        return redirect()->route('grouploans.index')->with('success', 'Group loan updated successfully.');
    }

    // Delete a group loan from the database
    public function destroy(GroupLoan $groupLoan)
    {
        $groupLoan->delete();
        return redirect()->route('grouploans.index')->with('success', 'Group loan deleted successfully.');
    }
}
