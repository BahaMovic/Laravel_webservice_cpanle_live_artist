<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['id', 'text', 'user_id', 'provider_id', 'created_at', 'updated_at'];
    protected $table = 'notification';
}
