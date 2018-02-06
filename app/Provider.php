<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DB;
class Provider extends Model
{
    protected $fillable= ['id', 'fullName', 'username', 'image', 'password', 'email','rate' , 'tradeName', 'phone', 'address', 'lat', 'long', 'about', 'created_at', 'updated_at'];
    protected $table = 'provider';
    public static function getByDistance($lat, $lng, $distance)
    {
      $results = \DB::select(\DB::raw('SELECT id, ( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( lat ) ) * cos( radians(`long`) - radians(' . $lng . ') ) + sin( radians(' . $lat .') ) * sin( radians(lat) ) ) ) AS distance FROM provider HAVING distance < ' . $distance . ' ORDER BY distance') );

      return $results;
    }


    public function images()
    {
    	return $this->hasMany('App\Image');
    }
    public function videos()
    {
      return $this->hasMany('App\Video');
    }

    public function orders()
    {
    	return $this->hasMany('App\Orders');
    }

  public function rates()
    {
    	return $this->hasMany('App\Rate');
    }

    public function services()
    {
    	return $this->hasMany('App\Service');
    }








}
