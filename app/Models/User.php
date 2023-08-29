<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    static public function getSingleAdmin($id)
    {
        return self::find($id);
    }
    static public function getAdmin()
    {
        $admin = self::select('users.*')->where('user_type', '=', 1)->where('is_delete', 0);

        if (!empty(Request::get('name'))) {
            $admin = $admin->where('name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $admin = $admin->where('email', 'like', '%' . Request::get('email') . '%');
        }

        if (!empty(Request::get('date'))) {
            $admin = $admin->whereDate('created_at', 'like', '%' . Request::get('date') . '%');
        }


        $admin = $admin->orderBy('id', 'desc')->paginate(10);

        return $admin;
    }
    static public function getSingleEmail($email)
    {
        return self::where('email', '=', $email)->first();
    }

    static public function getSingleToken($remember_token)
    {
        return self::where('remember_token', '=', $remember_token)->first();
    }
}
