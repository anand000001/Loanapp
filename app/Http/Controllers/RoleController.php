<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view role', ['only' => ['index']]);
    //     $this->middleware('permission:edit role', ['only' => ['edit']]);
    //     $this->middleware('permission:create role', ['only' => ['create']]);
    //     $this->middleware('permission:destroy role', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $roles=Role::orderBy('name', 'ASC')->get();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        $permissions=Permission::orderBy('name','ASC')->get();
        return view('role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        try {
            // Create a new permission
            $role = new Role();
            $role->name = $request->input('name');
            $role->guard_name = 'web';
            $role->save();

            if(!empty($request->permission)){
                foreach($request->permission as $name){
                    $role->givePermissionTo($name);
                }
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create permission.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return redirect()->route('role.index')->with("Role Created Successfully");
        
    }

    public function edit($id)
    {
        try {
            $role = Role::findOrFail($id);
            $hasPermissions =$role->permissions->pluck('name');
            $permissions=Permission::orderBy('name','ASC')->get();
    
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Permission not found.',
            ], 404);
        }
        return view('role.edit', compact('role','permissions','hasPermissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required|string|max:255|unique:roles,name,' . $id,
        ]);
       
        try {
            // Create a new permission
            $role = Role::findOrFail($id);
            $role->name = $request->input('name');
            $role->guard_name = 'web';
            $role->save();

            if(!empty($request->permission)){
                $role->syncPermissions($request->permission);   
            }else{
                $role->syncPermissions([]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create permission.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return redirect()->route('role.index')->with("Role Updated Successfully");

    }

    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
    
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete permission.',
                'error' => $e->getMessage(),
            ], 500);
        } 
        return redirect()->route('role.index')->with("Role Updated Successfully");

    }
}
