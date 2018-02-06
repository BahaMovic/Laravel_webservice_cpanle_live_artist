<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Message;
use Auth;
class messageController extends Controller
{
  public function getMessages($id,$adminid)
  {
    $data = Message::where('user_id','=',$id)->orWhere('sender_id','=',$id)->get();
    return view('admin.pages.myMessages',compact('data','id'));
  }

  public function postMessages(Request $req,$id,$adminid)
  {

    Message::create(['user_id'=>Auth::user()->id,'message'=>$req['message'],'sender_id'=>'11']);
     return Redirect::back();
  }
  public function getMessagesadmin($id)
  {
    Message::where('user_id','=',$id)->orWhere('sender_id','=',$id)->update(['seen'=>'1']);
    $data = Message::where('user_id','=',$id)->orWhere('sender_id','=',$id)->get();
    return view('admin.pages.messages',compact('data','id'));
  }

  public function postMessagesadmin(Request $req,$id)
  {

    Message::create(['user_id'=>'11','message'=>$req['message'],'sender_id'=>$id]);
     return Redirect::back();
  }
}
