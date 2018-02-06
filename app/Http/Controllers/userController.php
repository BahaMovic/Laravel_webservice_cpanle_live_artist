<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function index()
    {
        $data['users'] = User::get();
        return $data;
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

    function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    public function store(Request $request ,$id)
    {
      $data['userResponse']['data'] =[];
      try
  {
        $data['userResponse']['data'] = User::create(
            [
                'firstName'=>$request['firstName'],
                'lastName'=>$request['lastName'],
                'fullName'=>$request['firstName']." ".$request['lastName'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],
                'password'=>$request['password'],

                'remember_token'=>$this->generateRandomString(15)

            ]);
            if($id == 1)
            {$data['userResponse']['error'] = 'تم أنشاء حساب جديد';}
            else {
              $data['userResponse']['error'] = 'A new account has been created';
            }

          }catch(Exception $exception)
          {
            $data['userResponse']['error'] = $exception;

           if($data['userResponse']['error']->errorInfo[0] == "23000")
           {
             if($id == 1)
             {
              $data['userResponse']['error'] = 'هذا المستخدم موجود بالفعل';
             }else {
              $data['userResponse']['error'] = "This user already exists";
             }

           }
           else {
             if($id == 1)
             {
              $data['userResponse']['error'] = "خطأ في الادخال";
             }else {
              $data['userResponse']['error'] = "invalid";
             }
           }
          }

        return  $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['user'] = User::where('id','=',$id)->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ,$id_lan)
    {
      $data['userResponse']['data'] =[];
      try
      {
        $data['userResponse']['data'] = User::where('id','=',$id)->update(
         [
            'firstName'=>$request['firstName'],
            'lastName'=>$request['lastName'],
            'email'=>$request['email'],

            'password'=>$request['password'],
            'remember_token'=>$this->generateRandomString(15)

        ]);


            if($id_lan == 1)
            {$data['userResponse']['error'] = 'تم حفظ البيانات';}
            else {
              $data['userResponse']['error'] = 'Data saved';
            }

          }catch(Exception $exception)
          {
            $data['userResponse']['error'] = $exception;

           if($data['userResponse']['error']->errorInfo[0] == "23000")
           {
             if($id_lan == 1)
             {
              $data['userResponse']['error'] = 'هذا المستخدم موجود بالفعل';
             }else {
              $data['userResponse']['error'] = "This user already exists";
             }

           }
           else {
             if($id_lan == 1)
             {
              $data['userResponse']['error'] = "خطأ في الادخال";
             }else {
              $data['userResponse']['error'] = "invalid";
             }
           }
          }

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['userResponse'] = User::where('id','=',$id)->delete();
        return $data;
    }
}
