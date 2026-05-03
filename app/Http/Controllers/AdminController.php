<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Pinapakita nito ang page at kinukuha lahat ng registered accounts
    public function index()
    {
        // Kukunin natin lahat ng users, pwede mo i-exclude ang sarili mong admin account kung gusto mo
        $users = User::all(); 
        
        return view('auth.adminDashboard', compact('users'));
    }

    // Ito ang nagse-save ng bagong password kapag kinlick ang "Save"
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:8',
        ]);

        $user = User::findOrFail($id);
        
        // Ine-encrypt natin ulit ang bagong password bago i-save
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', "Password for {$user->first_name} has been successfully updated!");
    }
}