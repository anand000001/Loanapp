<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view agent', ['only' => ['index']]);
        $this->middleware('permission:edit agent', ['only' => ['edit']]);
        $this->middleware('permission:create agent', ['only' => ['create']]);
        $this->middleware('permission:destroy agent', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the agents.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();
        $cities= City::all();
        return view('agent.index', compact('agents','cities'));
    }

    /**
     * Show the form for creating a new agent.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('agent.create');
    }

    /**
     * Store a newly created agent in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('agent_name'),
            'email' => $request->input('agent_code'),
            'password' => Hash::make($request->input('agent_password')),
        ]);

        Agent::create([
            'agent_name' => $request->input('agent_name'),
            'agent_code' => $request->input('agent_code'),
            'city_list' => $request->input('city'),
            'password' => $request->input('password'),
            'user_id' => $user->id,
        ]);

        return redirect()->route('agent.index')->with('success', 'Agent created successfully.');
    }

    /**
     * Show the form for editing the specified agent.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::findOrFail($id); // Fetch the agent by ID
        return view('agent.edit', compact('agent'));
    }

    /**
     * Update the specified agent in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agent = Agent::findOrFail($id);

        $request->validate([
            'agent_name' => 'required|string|max:255',
            'agent_code' => 'required|string|max:10|unique:agents,agent_code,' . $id,
            'city_list' => 'nullable|string|max:255',
            'agent_password' => 'nullable|string|min:6',
        ]);

        $agent->agent_name = $request->input('agent_name');
        $agent->agent_code = $request->input('agent_code');
        $agent->city_list = $request->input('city_list');

        $agent->save();

        return redirect()->route('agent.index')->with('success', 'Agent updated successfully.');
    }

    /**
     * Remove the specified agent from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->delete();

        return redirect()->route('agent.index')->with('success', 'Agent deleted successfully.');
    }

}
