<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['id', 'name', 'description', 'provider_id', 'servicetype_id','price', 'created_at', 'updated_at'];
    
    public function servicetype()
    {
    	return $this->belongsTo('App\ServiceType');
    }
      public function provider()
    {
      return $this->belongsTo('App\Provider');
    }
}
