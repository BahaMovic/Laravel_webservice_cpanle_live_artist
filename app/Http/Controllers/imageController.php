<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use File;
use Validator;
use Illuminate\Support\Facades\Input;
class imageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $deleteFiles =  $request['delete'];
      $deleteArray = explode(",", $deleteFiles);
       for($i =0 ; $i < sizeof($deleteArray) ; $i++)
        {
           Image::where('id','=',$deleteArray[$i])->delete();
        }
      $files = Input::file('url');
    //  print_r($files);
      foreach ($files as $file) {
        $rules = array('file' => 'required|mimes:png,gif,jpeg');
        $validator = Validator::make(array('file'=> $file), $rules);
         if($validator->passes())
          {

            Image::create(['url'=>$this->imageEdit($file),'provider_id'=>$request['provider_id']]);
          }
      }


        // $data['imageResponse'] = Image::create(
        //     [
        //        // 'url'=>$this->imageEdit($request['url']),
        //         'url'=>$this->imageEdit($request['url']),
        //         'provider_id'=>$request['provider_id']
        //     ]);
      //  return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images['images']['data'] = Image::where('provider_id','=',$id)->get();
        return $images;
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['imageResponse'] = Image::where('id','=',$id)->delete();
        return $data;
    }
}
