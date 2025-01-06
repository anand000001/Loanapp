<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class GroupController extends Controller
{   
    public function __construct()
    {
        $this->middleware('permission:view group', ['only' => ['index']]);
        $this->middleware('permission:edit group', ['only' => ['edit']]);
        $this->middleware('permission:create group', ['only' => ['create']]);
        $this->middleware('permission:destroy group', ['only' => ['destroy']]);
    }

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
