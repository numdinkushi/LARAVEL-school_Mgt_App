<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list()
    {
        $data['classRecord'] = ClassRoom::getClassRecord();
        $data['header_title'] = "Class list";
        return view('admin.class.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Class";
        return view('admin.class.add', $data);
    }

    public function store(Request $request)
    {
        $class = new ClassRoom();
        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();
        return redirect('admin/class/list')->with('success', 'Class successfully created');
    }
    public function edit($id)
    {
        $data['singleClass'] = ClassRoom::getSingleClass($id);
        if (!empty($data['singleClass'])) {
            $data['header_title'] = "Add New Class";
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $class = ClassRoom::getSingleClass($id);
        $class->name = $request->name;
        $class->status = $request->status;
        $class->save();

        return redirect('admin/class/list')->with('success', 'Class successfully updated');
    }

    public function delete($id)
    {
        $user = ClassRoom::getSingleClass($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/class/list')->with('success', 'Class successfully deleted');
    }
}
