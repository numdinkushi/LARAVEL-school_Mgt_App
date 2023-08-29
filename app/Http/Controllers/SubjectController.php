<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list()
    {
        $data['subjectRecord'] = Subject::getSubjectRecord();
        $data['header_title'] = "Subject list";
        return view('admin.subject.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Subject";
        return view('admin.subject.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'status' => 'required'
        ]);

        $class = new Subject();
        $class->name = trim($request->name);
        $class->type = $request->type;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();
        return redirect('admin/subject/list')->with('success', 'Class successfully created');
    }

    public function edit($id)
    {
        $data['singleSubject'] = Subject::getSingleSubject($id);
        if (!empty($data['singleSubject'])) {
            $data['header_title'] = "Add New Subject";
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'type' => 'nullable',
            'status' => 'nullable'
        ]);

        $subject = Subject::getSingleSubject($id);
        $subject->name = $request->name;
        $subject->status = $request->status;
        $subject->save();

        return redirect('admin/subject/list')->with('success', 'Subject successfully updated');
    }

    public function delete($id)
    {
        $subject = Subject::getSingleSubject($id);
        $subject->is_delete = '1';
        $subject->save();

        return redirect('admin/subject/list')->with('success', 'Subject successfully deleted');
    }
}
