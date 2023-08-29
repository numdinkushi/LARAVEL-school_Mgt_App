<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'class';

    static public function getSingleClass($id)
    {
        return self::find($id);
    }

    static public function getClassRecord()
    {
        $class = self::select('class.*', 'users.name as created_by')
            ->join('users', 'users.id', 'class.created_by');

        if (!empty(Request::get('name'))) {
            $class = $class->where('class.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('date'))) {
            $class = $class->whereDate('class.created_at', 'like', '%' . Request::get('date') . '%');
        }

        $class = $class->where('class.is_delete', '=', '0')
            ->orderBy('class.id', 'desc')
            ->paginate(10);
        return $class;
    }
}
