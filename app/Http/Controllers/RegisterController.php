<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        $roles = DB::table('roles')->get();
        return view('auth.register', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required', 'exists:roles,id'],
            'token' => ['required', 'string'], // This is a placeholder for token validation
        ]);

        // Placeholder for token validation logic
        // For now, we'll just check if it's not empty
        if (empty($request->token)) {
            return back()->withErrors([
                'token' => 'The provided token is invalid.',
            ])->onlyInput('token');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}