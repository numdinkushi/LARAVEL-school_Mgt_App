<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'created_by', 'status', 'is_delete'];

    static public function getSingleSubject($id)
    {
        return self::find($id);
    }
    static public function getSubjectRecord()
    {
        $subject = self::select('subjects.*', 'users.name as created_by')
            ->join('users', 'users.id', 'subjects.created_by');

        if (!empty(Request::get('name'))) {
            $subject = $subject->where('subjects.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('date'))) {
            $subject = $subject->whereDate('subjects.created_at', 'like', '%' . Request::get('date') . '%');
        }

        $subject = $subject->where('subjects.is_delete', '=', '0')
            ->orderBy('subjects.id', 'desc')
            ->paginate(10);
        return $subject;
    }
}
