<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable =['id','user_id','message','sender_id'];
    protected $table = 'message';

    public function messages()
    {
      return $this->belongsTo('App\User');
    }
}
