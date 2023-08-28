<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        $user_type_value = Auth::user()->user_type;

        if ($user_type_value == 1) {
            return view('admin.dashboard', $data);
        }
        if ($user_type_value == 2) {
            return view('teacher.dashboard', $data);
        }
        if ($user_type_value == 3) {
            return view('student.dashboard', $data);
        }
        if ($user_type_value == 4) {
            return view('parent.dashboard', $data);
        }
    }
}
