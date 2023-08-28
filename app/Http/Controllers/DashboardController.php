<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user_type_value = Auth::user()->user_type;

        if ($user_type_value == 1) {
            return view('admin.dashboard');
        }
        if ($user_type_value == 2) {
            return view('teacher.dashboard');
        }
        if ($user_type_value == 3) {
            return view('student.dashboard');
        }
        if ($user_type_value == 4) {
            return view('parent.dashboard');
        }
    }
}
