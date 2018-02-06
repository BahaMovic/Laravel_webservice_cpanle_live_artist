<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
  protected $table = 'rate';
  protected $fillable = ['id', 'rate', 'user_id' , 'provider_id', 'created_at', 'updated_at'];


    public function provider()
    {
      return $this->belongsTo('App\Provider');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
