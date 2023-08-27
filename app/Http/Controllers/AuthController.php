<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Hash;

class AuthController extends Controller
{
    public function login()
    {

        if (!empty(Auth::check())) {

            $user_type_value = Auth::user()->user_type;

            if ($user_type_value == 1) {
                return redirect('admin/dashboard');
            }
            if ($user_type_value == 2) {
                return redirect('teacher/dashboard');
            }
            if ($user_type_value == 3) {
                return redirect('student/dashboard');
            }
            if ($user_type_value == 4) {
                return redirect('parent/dashboard');
            }
        }

        return view('auth.login');
    }

    public function authLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $user_type_value = Auth::user()->user_type;

            if ($user_type_value == 1) {
                return redirect('admin/dashboard');
            }
            if ($user_type_value == 2) {
                return redirect('teacher/dashboard');
            }
            if ($user_type_value == 3) {
                return redirect('student/dashboard');
            }
            if ($user_type_value == 4) {
                return redirect('parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
