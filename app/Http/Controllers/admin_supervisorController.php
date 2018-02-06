<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\User;
class admin_supervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = User::where('type_id','>',1)->get();
        return view('admin.pages.supervisor',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
      // return Redirect::back()->withErrors(['msg', 'The Message']);

      $data = User::where('email','=',$request['email'])->orWhere('phone','=',$request['phone'])->count();
      if($data > 0)
      {
        return Redirect::back()->withErrors(['هذه البيانات موجودة بالفعل', 'The Message']);
      }
        User::create([
          'firstName'=>$request['firstName'],
          'lastName'=>$request['lastName'],
          'fullName'=>$request['firstName']." ".$request['lastName'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'type_id'=>$request['type_id'],
          'active'=>'1',
          'password'=>$request['password']
        ]);
        return redirect('admin/supervisor');
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
    public function edit($id)
    {
          $data = User::where('id','=',$id)->get()->last();
          return view('admin.pages.editsupervisor',compact('data'));
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

        User::where('id','=',$id)->update([
          'firstName'=>$request['firstName'],
          'lastName'=>$request['lastName'],
          'fullName'=>$request['firstName']." ".$request['lastName'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'type_id'=>$request['type_id'],
          'password'=>$request['password']
        ]);
        return Redirect::to('admin/supervisor')->withErrors(['تم تعديل البيانات بنجاح', 'The Message']);
    }









    public function stop($id)
    {
      $data = User::where('id','=',$id)->get()->last();
      if($data->active == 0)
      {User::where('id','=',$id)->update(['active'=>'1']);}
      else {
        User::where('id','=',$id)->update(['active'=>'0']);
      }

      return redirect('admin/supervisor');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id','=',$id)->delete();
        return redirect('admin/supervisor');
    }
}
