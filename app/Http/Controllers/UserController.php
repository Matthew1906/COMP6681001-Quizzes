<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('pages.register', $data);
    }

    public function register_user(Request $request) {
        $request->validate([
            'role_id' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'dob' => 'required'
        ]);

        // dd($request);
        $user = new User([
            'role_id' => $request->role_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob
        ]);
        $user->save();

        $data['title'] = 'Register';
        return view('pages.register', $data);
    }

    public function login() {
        $data['title'] = 'Login';
        return view('pages.login', $data);
    }

    public function login_user(Request $request)
    {
        $data['title'] = 'Login';
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            // return redirect()->intended('/');
            return view('pages.login', $data);
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }


}
