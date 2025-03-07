<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    // Display the admin panel
    public function index()
    {
        // Check if the user is an admin
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.'); // Abort if the user is not an admin
        }

        // Return the admin panel view
        return view('admin.panel');
    }

    // Manage users
    public function manageUsers()
    {
        $users = \App\Models\User::all(); // Fetch all users from the database
        return view('admin.manage-users', compact('users')); // Pass users to the view
    }

    // Make a user an admin
    public function makeAdmin($id)
    {
        $user = \App\Models\User::findOrFail($id); // Find the user by ID or fail
        $user->is_admin = true; // Promote the user to admin
        $user->save(); // Save changes to the database

        return redirect()->back()->with('success', 'User has been upgraded to admin!'); // Redirect back with success message
    }

    // Revoke admin rights from a user
    public function revokeAdmin($id)
    {
        $user = \App\Models\User::findOrFail($id); // Find the user by ID or fail
        $user->is_admin = false; // Revoke admin rights
        $user->save(); // Save changes to the database

        return redirect()->back()->with('success', 'Admin rights revoked successfully!'); // Redirect back with success message
    }


public function create()
{
    return view('admin.create-user'); // عرض النموذج
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'is_admin' => 'required|boolean',
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'is_admin' => $validated['is_admin'],
    ]);

    return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
}
}