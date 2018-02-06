<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdverImage extends Model
{
  protected $fillable=['id', 'url', 'user_id', 'created_at', 'updated_at'];
  protected $table = 'advimage';
}
