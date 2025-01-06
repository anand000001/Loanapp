<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view user', ['only' => ['index']]);
        $this->middleware('permission:edit user', ['only' => ['edit']]);
       
    }

    public function index()
    {
        $users=User::all();
        return view('user.index', compact('users'));
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
            $user = User::findOrFail($id);
            $hasRoles =$user->roles->pluck('name');
            $roles=Role::orderBy('name','ASC')->get();
    
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Permission not found.',
            ], 404);
        }
        return view('user.edit', compact('user','roles','hasRoles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);
    
        try {
            $user = User::findOrFail($id);
    
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

            if(!empty($request->role)){
                $user->syncRoles($request->role);   
            }else{
                $user->syncRoles([]);
            }
           
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update permission.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return redirect()->route('user.index')->with("User Updated Successfully");
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'user deleted successfully!',
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
