<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
class notificationController extends Controller
{
        public function index()
        {
        $data['notifications'] = Notification::get();
        return $data;
        }




        public function store(Request $request)
        {
        $data['notificationResponse'] = Notification::create(
            [
                'text'=>$request['text'],
                'user_id'=>$request['user_id'],
                'provider_id'=>$request['provider_id'],


            ]);
        return $data;
        }

        public function showAsUser($id)
        {
        $data['notification'] = Notification::where('user_id','=',$id)->get();
        return $data;
        }

        public function showAsProvider($id)
        {
        $data['notification'] = Notification::where('provider_id','=',$id)->get();
        return $data;
        }


        public function destroy($id)
        {
          $data['notificationResponse'] = Notification::where('id','=',$id)->delete();
          return $data;
        }
}
