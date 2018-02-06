<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=['id', 'url', 'provider_id', 'created_at', 'updated_at'];
    protected $table = 'videos';

    public function provider()
    {
      return $this->belongsTo('App\Provider');
    }
}
