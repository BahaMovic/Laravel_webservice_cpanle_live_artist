<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['id', 'address','disc_code' , 'total', 'active','time','services', 'old_date', 'date', 'provider_id', 'user_id', 'created_at', 'updated_at'];
    protected $table = 'orders';

    public function provider()
    {
      return $this->belongsTo('App\Provider');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
