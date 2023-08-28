<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Hash;
use Str;

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

    public function forgetPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPasswordPost(Request $request)
    {
        $user = User::getSingleEmail($request->email);
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with('success', 'Please check your email and reset your password!');
        } else {
            return redirect()->back()->with('error', 'Email not found!');
        }
    }

    public function resetPassword($token)
    {
        $user = User::getSingleToken($token);
        if (!empty($token)) {
            $data['user'] = $user;
            return view('auth.reset-password', $data);
        } else {
            abort(404);
        }
    }
    public function resetPasswordPost($token, Request $request)
    {
        if ($request->password == $request->confirm_password) {
            $user = User::getSingleToken($token);
            if (!$user) {
                return redirect()->back()->with('error', 'Token does not exist');
            }
            $user->password = Hash::make($request->passowrd);
            $user->remember_token = Str::random(30);
            $user->save();
            return redirect(url(''))->with('success', 'Password successfully reset.');
        } else {
            return redirect()->back()->with('error', 'Passwords do not match!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
