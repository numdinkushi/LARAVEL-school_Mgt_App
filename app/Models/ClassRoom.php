<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassRoom extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'is_delete'];

    static public function getSingleClass($id)
    {
        return self::find($id);
    }

    static public function getClassRecord()
    {
        $class = self::select('class_rooms.*', 'users.name as created_by')
            ->join('users', 'users.id', 'class_rooms.created_by');

        if (!empty(Request::get('name'))) {
            $class = $class->where('class_rooms.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('date'))) {
            $class = $class->whereDate('class_rooms.created_at', 'like', '%' . Request::get('date') . '%');
        }

        $class = $class->where('class_rooms.is_delete', '=', '0')
            ->orderBy('class_rooms.id', 'desc')
            ->paginate(10);
        return $class;
    }
}
