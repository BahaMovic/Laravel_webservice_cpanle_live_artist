<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use App\Notific;
use App\NotificUser;
class rateController extends Controller
{
  public function index()
  {
  $data['notifications'] = Rate::get();
  return $data;
  }




  public function store(Request $request)
  {
  $data['rateResponse'] = Rate::create(
      [
          'rate'=>$request['rate'],
          'user_id'=>$request['user_id'],
          'provider_id'=>$request['provider_id'],


      ]);
      Notific::create([
        'provider_id'=>$request['provider_id'],
        'user_id'=>$request['user_id'],
        'rate_id'=>$data['rateResponse']->id,
        'text'=>'Service completed '.$data['rateResponse']->user->firstName." rate you ".$data['rateResponse']->rate,
        'text_ar'=>'تم الانتهاء من طلب '.$data['rateResponse']->user->firstName." وتقيمك ".$data['rateResponse']->rate
      ]);

  return $data;
  }

  public function showAsUser($id)
  {
  $data['rates'] = Rate::where('user_id','=',$id)->get();
  return $data;
  }

  public function showAsProvider($id)
  {
  $data['rates'] = Rate::where('provider_id','=',$id)->get();
  return $data;
  }


  public function destroy($id)
  {
    $data['rateResponse'] = Rate::where('id','=',$id)->delete();
    return $data;
  }
}
