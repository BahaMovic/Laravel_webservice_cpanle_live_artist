<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    protected $fillable =['id', 'total', 'provider_id', 'user_id', 'created_at', 'updated_at'];
    protected $table ='orderuser';
}
