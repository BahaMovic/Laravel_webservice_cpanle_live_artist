<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'firstName', 'lastName', 'fullName','email', 'active' , 'type_id' , 'phone', 'password', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    public function getTypeAttribute($id)
    {
      if($id == '1')
      {
        return 'مستخدم عادي';
      }
    }

    public function orders()
    {
      return $this->hasMany('App\Orders');
    }
    public function massages()
    {
      return $this->hasMany('App\Message');
    }
}
