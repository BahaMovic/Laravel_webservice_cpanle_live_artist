<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdverImage;
use Auth;
class admin_adverImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = AdverImage::get();
      return view('admin.pages.adv',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AdverImage::create([
          'url'=>$this->imageEdit($request['url']),
          'user_id'=>Auth::user()->id
        ]);

        return redirect('admin/get/adv');
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
        AdverImage::where('id','=',$id)->delete();
          return redirect('admin/get/adv');
    }
}
