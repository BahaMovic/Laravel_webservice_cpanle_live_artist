<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class locationController extends Controller
{
  public function getLocation(Request $request)
  {
    $lat = $request->get('lat');
    $lng = $request->get('long');
    $distance = 1000;

    $query = Provider::getByDistance($lat, $lng, $distance);
    return $query;
  }
}
