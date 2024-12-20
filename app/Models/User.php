<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

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
    ];

    // get àdmin data from database
    static public function getAdmin()
    {
        $return = self::select('*');

        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }

        if (!empty(Request::get('is_admin'))) {
            $return = $return->where('is_admin', '=', Request::get('is_admin'));
        }

        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('address'))) {
            $return = $return->where('address', 'like', '%' . Request::get('address') . '%');
        }

        if (!empty(Request::get('status'))) {
            $status  = Request::get('status');
            if ($status == 100) {
                $status = 0;
            }
            $return = $return->where('status', '=', $status);
        }

        $return = $return->whereIn('is_admin', array('1', '2'))
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(2);
        return $return;
    }

    // get school data from database
    static public function getSchool()
    {
        $return = self::select('*');

        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }

        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('address'))) {
            $return = $return->where('address', 'like', '%' . Request::get('address') . '%');
        }

        if (!empty(Request::get('status'))) {
            $status  = Request::get('status');
            if ($status == 100) {
                $status = 0;
            }
            $return = $return->where('status', '=', $status);
        }

        $return = $return->where('is_admin', '=', 3)
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(2);
        return $return;
    }

    static public function getSingleEditData($id)
    {
        return User::find($id);
    }

    public function getProfile()
    {
        if (!empty($this->profile_pic) && file_exists('upload/school_profile/' . $this->profile_pic)) {
            return url('upload/school_profile/' . $this->profile_pic);
        } else {
            return "";
        }
    }

    public function getAdminProfile()
    {
        if (!empty($this->profile_pic) && file_exists('upload/admin_profile/' . $this->profile_pic)) {
            return url('upload/admin_profile/' . $this->profile_pic);
        } else {
            return "";
        }
    }
}
