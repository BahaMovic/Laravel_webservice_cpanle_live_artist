<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notific extends Model
{
    protected $fillable = ['id', 'text','text_ar', 'user_id', 'order_id', 'rate_id', 'provider_id', 'created_at', 'updated_at'];
    protected $table = 'notific';

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function provider()
    {
      return $this->belongsTo('App\Provider');
    }

    public function rate()
    {
      return $this->belongsTo('App\Rate');
    }
    public function order()
    {
      return $this->belongsTo('App\Order');
    }
}
