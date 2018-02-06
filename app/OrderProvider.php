<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProvider extends Model
{
    protected $fillable =['id', 'total','active', 'provider_id', 'user_id', 'created_at', 'updated_at'];
    protected $table ='orderprovider';


    public function provider()
    {
    	return $this->belongsTo('App\Provider');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getProbivderAttribute($val)
    {
    	return $this->provider($val);
    }
}
