<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show the create form
    public function create()
    {
        return view('admin.create');
    }

    // Store form data into the admins table
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'mobile' => 'required|string|max:15',
            'password' => 'required|string|min:6',
        ]);

        // Store data into the admins table
        Admin::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        // Redirect to the create page with a success message
        return redirect()->route('admin.create')->with('success', 'Admin created successfully!');
    }
}
