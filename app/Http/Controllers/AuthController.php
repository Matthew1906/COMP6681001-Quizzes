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

    public function store(Request $request) {
        $request->validate([
            'role_id' => 'required',
            'full_name' => 'required',
            'email' => 'required|email',
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

    public function login() {
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

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function logout(){
        auth()->logout();
        return redirect(route('home'));
    }

    public function update(){
        return view ('pages.auth.update');
    }

    public function renew(Request $request){
        $request->validate([
            'password_old' => 'required',
            'password' => 'required|confirmed',
        ]);

        $old = $request->password_old;
        $password = $request->password;
        $user = Auth::user();

        if(Hash::check($old, Auth::user()->password)) {
            $user->password = Hash::make($password);
            $user->save();
            $message = "Update successful";
             return view ('pages.auth.update', compact('message'));
        }

            $message = "Update failed";
            return view ('pages.auth.update', compact('message'));
    }

}
