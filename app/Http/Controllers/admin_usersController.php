<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class admin_usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = User::with('orders')->get();
      return view('admin.pages.users',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function login()
     {
       return view('admin.pages.login');
     }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stop($id)
    {
      $data = User::where('id','=',$id)->get()->last();
      if($data->active == 1)
      {
        User::where('id','=',$id)->update(['active'=>'0']);
        return redirect('/show/users');
      }
      else {
        User::where('id','=',$id)->update(['active'=>'1']);
        return redirect('/show/users');
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      \App\Orders::where('user_id','=',$id)->delete();
      \App\NotificUser::where('user_id','=',$id)->delete();
      \App\Rate::where('user_id','=',$id)->delete();

      \App\User::where('id','=',$id)->delete();
      return redirect('/show/users');
    }
}
