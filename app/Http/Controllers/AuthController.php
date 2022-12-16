<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'full_name' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required',
            'dob' => 'required'
        ]);

        $user = new User([
            'role_id' => $request->role_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob
        ]);
        $user->save();
        return redirect(route("login"));
    }

    public function login()
    {
        return view('pages.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect(route("home"));
        }

        return back()->with('error', 'Incorrect email or password');;
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('home'));
    }

    public function edit()
    {
        return view('pages.auth.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password_old' => 'required',
            'password' => 'required|confirmed',
        ]);

        $old = $request->password_old;
        $password = $request->password;

        if (Hash::check($old, Auth::user()->password)) {
            User::where('id', '=', Auth::id())->update(['password' => Hash::make($password)]);
            return back()->with('success', 'Update Password Successful!');;
        }
        return back()->with('error', 'Update Password Failed!');;
    }
}
