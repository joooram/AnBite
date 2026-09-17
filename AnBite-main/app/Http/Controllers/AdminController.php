<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Admin Dashboard — show all users
    public function index()
    {
        $users = User::where('role', 'cho_staff')->orderBy('created_at', 'desc')->get();
        $totalUsers = $users->count();

        return view('auth.adminDashboard', compact('users', 'totalUsers'));
    }

    // Account Management page — show all staff
    public function accounts()
    {
        $users = User::where('role', 'cho_staff')->orderBy('created_at', 'desc')->get();

        return view('auth.admin-AccountManagement', compact('users'));
    }

    // Store new CHO Staff account
    public function storeStaff(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users',
            'password'   => 'required|string|min:8',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'username'   => $request->username,
            'password'   => Hash::make($request->password),
            'role'       => 'cho_staff',
            'email'      => null,
        ]);

        return redirect()->route('admin.accounts')
            ->with('success', "Account for {$request->first_name} {$request->last_name} was successfully created!");
    }

    // Update staff name/username (Edit)
    public function updateStaff(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users,username,' . $id,
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'username'   => $request->username,
        ]);

        return redirect()->route('admin.accounts')
            ->with('success', "Account for {$user->first_name} {$user->last_name} was successfully updated!");
    }

    // Reset password
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.accounts')
            ->with('success', "Password for {$user->first_name} {$user->last_name} was successfully reset!");
    }

    // Delete staff account
    public function destroyStaff($id)
    {
        $user = User::findOrFail($id);
        $name = $user->first_name . ' ' . $user->last_name;
        $user->delete();

        return redirect()->route('admin.accounts')
            ->with('success', "Account for {$name} was successfully deleted!");
    }
}