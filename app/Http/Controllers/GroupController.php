<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{   
    public function index()
    {
        $groups = Group::all();
        return view('group.index', compact('groups'));
    }
    public function create()
    {
        return view('groups.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
            'group_leadername' => 'required|string|max:255',
            'group_leadernumber' => 'required|string|max:15',
        ]);
        Group::create($request->all());
        return redirect()->back()->with('success', 'Group created successfully.');
    }
}
