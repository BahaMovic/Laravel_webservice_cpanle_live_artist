<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
class discountController extends Controller
{
	public function store(Request $request)
	{
	   $data['data'] = Discount::create([
	   'user_id'=>$request['user_id'],
	   'code'=>$request['code'],
	   'discount'=>$request['discount']
	   ]);
	   return $data;
	}

}
