<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\User;
use App\Provider;
class admin_reportsController extends Controller
{
  function index()
  {
    $orders = Orders::get();
    $users = User::with('orders')->get();
    $providers = Provider::with('images')->with('videos')->get();
    return view('admin.pages.reports',compact('users','orders','providers'));
  }
  function search(Request $req)
  {
    if($req['provider_id'] == "")
    {$orders = Orders::whereBetween('date',[$req['date_from'],$req['date_to']])->get();}
    elseif($req['date_from'] == "" || $req['date_to'] == "") {
      $orders = Orders::where('provider_id','=',$req['provider_id'])->get();
    }else {
      $orders = Orders::whereBetween('date',[$req['date_from'],$req['date_to']])->where('provider_id','=',$req['provider_id'])->get();
    }
    $users = User::with('orders')->get();
    $providers = Provider::with('images')->with('videos')->get();
    return view('admin.pages.reports',compact('users','orders','providers'));

    return view('admin.pages.reports');
  }
}
