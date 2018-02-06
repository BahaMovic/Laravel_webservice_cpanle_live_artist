<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=['id', 'url', 'provider_id', 'created_at', 'updated_at'];
    protected $table = 'images';

    public function provider()
    {
      return $this->belongsTo('App\Provider');
    }
}
