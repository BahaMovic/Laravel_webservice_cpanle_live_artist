<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use Exception;
use App\Rate;
class providerController extends Controller
{

    public function index()
    {
        $data['providers'] = Provider::get();
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
    public function store(Request $request,$id)
    {

        if($request['image'] == "")
        {
          $data['providerResponse']['data'] =[];
          try
      {
        $data['providerResponse'] = Provider::create(
            [
                'fullName'=>$request['fullName'],
                'username'=>$request['username'],
                'image'=>'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg',
                'password'=>$request['password'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],
                'address'=>$request['address'],
                'tradeName'=>$request['tradeName'],
                'long'=>$request['long'],
                'lat'=>$request['lat'],
                'about'=>$request['about']


            ]);
            if($id == 1)
            {$data['providerResponse']['error'] ='تم أنشاء حساب جديد';}
            else {
              $data['providerResponse']['error'] = 'A new account has been created';
            }

          }catch(Exception $exception)
          {
            $data['providerResponse']['error'] = $exception;

           if($data['providerResponse']['error']->errorInfo[0] == "23000")
           {
             if($id == 1)
             {
              $data['providerResponse']['error'] = 'هذا المستخدم موجود بالفعل';
             }else {
              $data['providerResponse']['error'] = "This user already exists";
             }

           }
           else {
             if($id == 1)
             {
              $data['providerResponse']['error'] = "خطأ في الادخال";
             }else {
              $data['providerResponse']['error'] = "invalid";
             }
           }
          }
    }
    else
    {
      $data['providerResponse']['data'] =[];
      try
  {
    $data['providerResponse'] = Provider::create(
       [
           'fullName'=>$request['fullName'],
           'username'=>$request['username'],
           'image'=>$this->imageEdit($request['image']),
           'password'=>$request['password'],
           'email'=>$request['email'],
           'phone'=>$request['phone'],
           'address'=>$request['address'],
           'tradeName'=>$request['tradeName'],
           'long'=>$request['long'],
           'lat'=>$request['lat'],
           'about'=>$request['about']


       ]);
        if($id == 1)
        {$data['providerResponse']['error'] = 'تم أنشاء حساب جديد';}
        else {
          $data['providerResponse']['error'] = 'A new account has been created';
        }

      }catch(Exception $exception)
      {
        $data['providerResponse']['error'] = $exception;

       if($data['providerResponse']['error']->errorInfo[0] == "23000")
       {
         if($id == 1)
         {
          $data['providerResponse']['error'] = 'هذا المستخدم موجود بالفعل';
         }else {
          $data['providerResponse']['error'] = "This user already exists";
         }

       }
       else {
         if($id == 1)
         {
          $data['providerResponse']['error'] = "خطأ في الادخال";
         }else {
          $data['providerResponse']['error'] = "invalid";
         }
       }
      }


    }
     return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['provider'] = Provider::where('id','=',$id)->get();
         $data1['rates'] = Rate::where('provider_id','=',$id)->get();
	  $sum = 0;
	  $count = 0;
	  foreach ($data1['rates'] as $key => $value) {
	    $count++;


	    $sum += $value->rate;
	  }
	if($sum == 0 || $count == 0)
	{
	 $data['rate'] = 0;
	  }
	  else
	  {
	   $rate = $sum/$count;
	  $data['rate'] = $rate;
	  }
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
    function imageEdit($image)
    {
        try {
        $imageName = date('d-m-y-h-s').$image->getClientOriginalName();
        $path = public_path().'/images/';
       $image->move($path , $imageName);
        return '/public/images/'.$imageName;
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$id_lan)
    {
    $data['providerResponse']=[];

      if(!isset($request['image']) || $request['image'] == "")
      {

      try
      {

        $data['providerResponse']['data'] = Provider::where('id','=',$id)->update(
         [
            'fullName'=>$request['fullName'],

            'password'=>$request['password'],

            'tradeName'=>$request['tradeName'],
            'address'=>$request['address'],
            'long'=>$request['long'],
            'lat'=>$request['lat'],
            'about'=>$request['about']
        ]);
         $data['providerResponse']['data'] = Provider::where('id','=',$id)->get();
            if($id_lan == 1)
            {$data['providerResponse']['error'] = 'تم حفظ البيانات';}
            else {
              $data['providerResponse']['error'] = 'Data saved';
            }

          }catch(Exception $exception)
          {
            $data['providerResponse']['error'] = $exception;

           if($data['providerResponse']['error']->errorInfo[0] == "23000")
           {
             if($id_lan == 1)
             {
              $data['providerResponse']['error'] = 'هذا المستخدم موجود بالفعل';
             }else {
              $data['providerResponse']['error'] = "This user already exists";
             }

           }
           else {
             if($id_lan == 1)
             {
              $data['providerResponse']['error'] = "خطأ في الادخال";
             }else {
              $data['providerResponse']['error'] = "invalid";
             }
           }
          }
          }
          else {
            {
            $data['providerResponse']['data'] = array();
            try
            {

              $data['providerResponse']['data'] = Provider::where('id','=',$id)->update(
               [
                  'fullName'=>$request['fullName'],

                  'password'=>$request['password'],
                  'image'=>$this->imageEdit($request['image']),
                  'tradeName'=>$request['tradeName'],
                  'address'=>$request['address'],
                  'long'=>$request['long'],
                  'lat'=>$request['lat'],
                  'about'=>$request['about']


              ]);
               $data['providerResponse']['data'] = Provider::where('id','=',$id)->get();
                  if($id_lan == 1)
                  {$data['providerResponse']['error'] = 'تم حفظ البيانات';}
                  else {
                    $data['providerResponse']['error'] =  'Data saved';
                  }

                }catch(Exception $exception)
                {
                  $data['providerResponse']['error'] = $exception;

                 if($data['providerResponse']['error']->errorInfo[0] == "23000")
                 {
                   if($id_lan == 1)
                   {
                    $data['providerResponse']['error'] = 'هذا المستخدم موجود بالفعل';
                   }else {
                    $data['providerResponse']['error'] = "This user already exists";
                   }

                 }
                 else {
                   if($id_lan == 1)
                   {
                    $data['providerResponse']['error'] = "خطأ في الادخال";
                   }else {
                    $data['providerResponse']['error'] = "invalid";
                   }
                 }
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
        $data['providerResponse'] = Provider::where('id','=',$id)->delete();
        return $data;
    }
}
