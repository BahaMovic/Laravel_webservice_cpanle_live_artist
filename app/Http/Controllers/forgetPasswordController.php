<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\myMail;
use Illuminate\Http\Request;
use App\Provider;
class forgetPasswordController extends Controller
{
	public function sendEmail(Request $request)
	{
		$email = "bahaa.lashin@gmail.com";
		Mail::to($email)->send(new myMail);
		
	}
}