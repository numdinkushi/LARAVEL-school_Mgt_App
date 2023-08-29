<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin list";
        return view('admin.admin.list', $data);
    }

    public function addAdmin()
    {
        $data['header_title'] = "Add New Admin";
        return view('admin.admin.add', $data);
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin successfully created');
    }

    public function editAdmin($id)
    {
        $data['getRecord'] = User::getSingleAdmin($id);
        if ($data['getRecord']) {
            $data['header_title'] = "Edit Admin";
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    public function updateAdmin($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $user = User::getSingleAdmin($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin successfully created');
    }

    public function deleteAdmin($id)
    {
        $user = User::getSingleAdmin($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin successfully deleted');
    }
}
