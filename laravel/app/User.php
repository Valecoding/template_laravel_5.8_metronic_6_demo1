<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function isSuperAdmin()
    {
        if (Auth::check()) {
            if ($this->group_id == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isAdmin()
    {
        if (Auth::check()) {
            if ($this->group_id == 2) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function isGlavBux()
    {
        if (Auth::check()) {
            if ($this->group_id == 3) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function isBux()
    {
        if (Auth::check()) {
            if ($this->group_id == 4) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isAdmins()
    {
        if (Auth::check()) {
            if ($this->group_id == 2 || $this->group_id == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getGroup()
    {
        if ($this->group != null) {
            return $this->group->name;
        } else {
            return '';
        }
    }
}
