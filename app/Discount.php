<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable=['id', 'user_id', 'code','ord_from','ord_to', 'discount', 'created_at', 'updated_at'];
    protected $table = 'discount';

    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
