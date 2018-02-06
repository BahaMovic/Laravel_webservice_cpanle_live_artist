<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificUser extends Model
{
    protected $fillable = ['id', 'text','text_ar', 'user_id', 'order_id', 'rate_id', 'provider_id', 'created_at', 'updated_at','type'];
    protected $table = 'notific_user';
}
