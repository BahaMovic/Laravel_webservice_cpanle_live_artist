<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Rate;
class admin_providersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function rate($id,$user_id)
     {
       $id = $id + 1;
       Provider::where('id','=',$user_id)->update(['rate'=>$id]);

       return redirect('/admin/providers');
     }
     public function stop2($id)
     {
       $data = Provider::where('id','=',$id)->get()->last();
       if($data->active == 1)
       {
         Provider::where('id','=',$id)->update(['active'=>'0']);
         return redirect('/admin/providers');
       }
       else {
         Provider::where('id','=',$id)->update(['active'=>'1']);

       }
       return redirect('/admin/providers');
     }
    public function index()
    {

        $query = Provider::with('images')->with('videos')->with('orders')->get();
        $data['provider'] = [];
    $index = 0;
    foreach($query as $row)
    {
      if($row->rate == 0)
      {
    	$rateCount = Rate::where('provider_id','=',$row->id)->count();
    	$rateSum = Rate::where('provider_id','=',$row->id)->sum('rate');
    	if($rateCount != 0){
    		$row->rate = $rateSum/$rateCount;
    	}
    	else
    	{
    		$row->rate = 0;
    	}
      }
      else {
        $row->rate = $row->rate;
      }
    	$data['provider'][$index] = $row;
    	$index++;
    }
    $data = $data['provider'];
        return view('admin.pages.provider',compact('data'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      \App\Image::where('provider_id','=',$id)->delete();
      \App\Video::where('provider_id','=',$id)->delete();
        \App\Orders::where('provider_id','=',$id)->delete();

        \App\Notific::where('provider_id','=',$id)->delete();
        \App\Rate::where('provider_id','=',$id)->delete();
        \App\Service::where('provider_id','=',$id)->delete();
        \App\Provider::where('id','=',$id)->delete();
        return redirect('/admin/providers');
    }

    public function deleteImage($id)
    {
      \App\Image::where('id','=',$id)->delete();
      return redirect('/admin/providers');
    }
}
