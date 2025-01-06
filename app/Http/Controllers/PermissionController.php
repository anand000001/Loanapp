<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view permission', ['only' => ['index']]);
    //     $this->middleware('permission:edit permission', ['only' => ['edit']]);
    //     $this->middleware('permission:create permission', ['only' => ['create']]);
    //     $this->middleware('permission:destroy permission', ['only' => ['destroy']]);
    // }
    
    //
    public function index()
    {
        $permissions=Permission::all();
        return view('permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        try {
            // Create a new permission
            $permission = new Permission();
            $permission->name = $request->input('name');
            $permission->guard_name = 'web';
            $permission->save();

            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create permission.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return redirect()->route('permission.index')->with("Permission Updated Successfully");
        
    }

    public function edit($id)
    {
        try {
            $permission = Permission::findOrFail($id);
    
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Permission not found.',
            ], 404);
        }
        return view('permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);
    
        try {
            $permission = Permission::findOrFail($id);
    
            $permission->name = $request->input('name');
            $permission->guard_name = 'web';
            $permission->save();
           
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update permission.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return redirect()->route('permission.index')->with("Permission Updated Successfully");
    }

    public function destroy($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Permission deleted successfully!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete permission.',
                'error' => $e->getMessage(),
            ], 500);
        } 
    }






}
