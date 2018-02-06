<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Notific;
use App\NotificUser;
use App\Discount;
class ordersController extends Controller
{
      public function index()
      {
         $data['orders'] = Orders::get();
         return $data;
      }

      public function editOrder(Request $request ,$id,$notific_id)
      {
        $data['orders'] = Orders::where('id','=',$id)->get()->last();
        $data['response'] = Orders::where('id','=',$id)->update(['active'=>2]);
	Notific::where('id','=',$notific_id)->delete();
        NotificUser::create([
          'provider_id'=>$data['orders']->provider_id,
          'user_id'=>$data['orders']->user_id,
          'order_id'=>$id,
          'text'=>'Your service has been approved by '.$data['orders']->provider->username,
          'text_ar'=>'تم الموافقة علي خدمتك من '.$data['orders']->provider->username,
           'type'=>'2'
        ]);
        return $data;
      }

      public function editOrderCancel(Request $request ,$id,$notific_id)
      {
        $data['orders'] = Orders::where('id','=',$id)->get()->last();
        $data['response'] = Orders::where('id','=',$id)->update(['active'=>0]);
	Notific::where('id','=',$notific_id)->delete();
        NotificUser::create([
          'provider_id'=>$data['orders']->provider_id,
          'user_id'=>$data['orders']->user_id,
          'order_id'=>$id,
          'text'=>'Service has been canceled by '.$data['orders']->provider->username,
          'text_ar'=>'تم رفض الخدمة من قبل'.$data['orders']->provider->username,
           'type'=>'1'
        ]);
        return $data;
      }


      public function store(Request $request)
      {
    $data['discount'] = Discount::where('code','=',$request['disc_code'])->where('user_id','=',$request['user_id'])->get()->last();
         if(sizeof($data['discount']) > 0)
         {
                $totalCost = ($data['discount']->discount/100)*$request['total'];
                Discount::where('code','=',$request['disc_code'])->where('user_id','=',$request['user_id'])->delete();
         }
         else
          {
               $totalCost = $request['total'];
          }
         $data['orders'] = Orders::create(
             [
                 'total'=>$totalCost,
                 'provider_id'=>$request['provider_id'],
                 'user_id'=>$request['user_id'],
                 'active'=>$request['active'],
                 'old_date'=>$request['old_date'],
                 'date'=>$request['date'],
                 'time'=>$request['time'],
                 'address'=>$request['address'],
                 'disc_code'=>$request['disc_code'],
                 'services'=>$request['services']

             ]);


             Notific::create([
               'provider_id'=>$request['provider_id'],
               'user_id'=>$request['user_id'],
               'order_id'=>$data['orders']->id,
               'text_ar'=>'يوجد خدمة جديدة من '.$data['orders']->user->firstName,
               'text'=>'There is a new service from '.$data['orders']->user->firstName
             ]);
             // NotificUser::create([
             //   'provider_id'=>$request['provider_id'],
             //   'user_id'=>$request['user_id'],
             //   'order_id'=>$data['orders']->id,
             //   'text'=>'new Rate',
             //   'text_ar'=>'لسا بدري'
             // ]);

         return $data;
      }

      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function showProv($id)
      {
        $data['orders'] = Orders::where('provider_id','=',$id)->with('user')->get();
        $data['total_price'] = Orders::where('old_date','=','1')->sum('total');
         return $data;
      }

      public function show($id)
      {
        $data['order'] = Orders::where('id','=',$id)->with('user')->with('provider')->get();
         return $data;
      }

      public function showUsers($id)
      {
        $data['orders'] = orders::where('user_id','=',$id)->with('provider')->get();
        $data['total_price'] = Orders::where('old_date','=','1')->sum('total');

         return $data;
      }




      public function destroy($id)
      {
         $data['orders'] = orders::where('id','=',$id)->delete();
         return $data;
      }
}
