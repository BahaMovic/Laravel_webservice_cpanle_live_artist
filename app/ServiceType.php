<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $table = 'servicetype';
    protected $fillable = ['id', 'title', 'created_at', 'updated_at'];

    public function services()
    {
      return $this->hasMany('App\Service');
    }
}
