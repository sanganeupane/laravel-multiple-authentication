<?php

namespace App\Models\AdminUser;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User
//    or add
    as Auth;


class AdminUser extends
//    only 'user' pani milchha
    Auth
{
    protected $guarded='admin';
    protected $fillable= ['name','username','email','password','image','status','admin_type'];
}
