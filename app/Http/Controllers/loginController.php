<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\User;
class loginController extends Controller
{
    public function loginAsProvider(Request $req , $id)
    {
    	$data['providerLogin']['data'] = Provider::where('username','=',$req['username'])->where('password','=',$req['password'])->get();
      $datas = Provider::where('username','=',$req['username'])->where('password','=',$req['password'])->get()->last();


        if(sizeof($data['providerLogin']['data']) == 0)
        {
            if($id == 1)
            {
                $data['providerLogin']['message']='أسم المستخدم او كلمة المرور غير صحيحة';
            }else
            {
                $data['providerLogin']['message']='Username or password is incorrect';
            }
            $data['providerLogin']['message_id'] = 0;
        }


        else
        {
	        if($datas['active'] == 0)
	      {
	      	$data['providerLogin']['data'] = [];
	        if($id == 1)
	        {
	            $data['providerLogin']['message']='هذا الحساب مغلق مؤقتا';
	        }else
	        {
	            $data['providerLogin']['message']='deactived account';
	        }
	        $data['providerLogin']['message_id'] = 0;
	        return $data;
	      }
            if($id == 1)
            {
                $data['providerLogin']['message']='تم تسجيل الدخول';
            }else
            {
                $data['providerLogin']['message']='Login Successful!';
            }
            $data['providerLogin']['message_id']  = 1;
        }
    	return $data;

    }

    public function loginAsUser(Request $req,$id)
    {
$data['userLogin']['data'] = User::where('phone','=',$req['phone'])->where('password','=',$req['password'])->get();
  $datasa = User::where('phone','=',$req['phone'])->where('password','=',$req['password'])->get()->last();

         if(sizeof($data['userLogin']['data']) == 0)
        {
            if($id == 1)
            {
                $data['userLogin']['message']='رقم الجوال او كلمة المرور غير صحيحة';
            }else
            {
                $data['userLogin']['message']='Phone or password is incorrect';
            }
            $data['userLogin']['message_id'] = 0;
        }
        else
        {
        if($datasa['active'] == 0)
		  {
		  $data['userLogin']['data'] = [];
		    if($id == 1)
		    {
		        $data['userLogin']['message']='هذا الحساب مغلق مؤقتا';
		    }else
		    {
		        $data['userLogin']['message']='deactived account';
		    }
		    $data['userLogin']['message_id'] = 0;
		    return $data;
		  }
		if($id == 1)
            {
                $data['userLogin']['message']='تم التسجيل بنجاح';
            }else
            {
                $data['userLogin']['message']='Login Successful!';
            }
            $data['userLogin']['message_id']  = 1;
        }

    	return $data;
    }
}
