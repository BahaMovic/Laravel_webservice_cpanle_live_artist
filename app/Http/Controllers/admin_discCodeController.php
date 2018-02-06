<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\User;
class admin_discCodeController extends Controller
{
    public function index()
    {
      $data = Discount::get();
      return view('admin.pages.disc',compact('data'));
    }
    public function create(Request $req)
    {
      $users = User::withCount('orders')->get();
      $to = $req['to'];
      $from = $req['from'] ;

      for($i = 0 ; $i < sizeof($users) ; $i++)
      {
      //  echo print_r($users[$i]['orders_count']);
        if($from < $users[$i]['orders_count']  && $users[$i]['orders_count'] < $to )
        {
          //echo $from ." ". $users[$i]['orders_count']." ".$to."<br>";
           Discount::create([
     	    'user_id'=>$users[$i]['id'],
     	    'code'=>$req['code'],
          'ord_from'=>$from,
          'ord_to'=>$to,
     	    'discount'=>$req['disc']
     	    ]);
        }

      }
      return redirect('discount/code');
    }

    public function destroy($id)
    {
      Discount::where('id','=',$id)->delete();
      return redirect('discount/code');
    }
}
