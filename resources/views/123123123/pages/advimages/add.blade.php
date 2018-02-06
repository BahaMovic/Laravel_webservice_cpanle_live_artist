@extends('admin.layouts.mainPage')

@section('header')

@endsection
@section('content')
<div class="container">
  {{ Form::open( [ 'url' => 'admin/add/advimages', 'method' => 'post', 'files' => true ,'style'=>"padding: 20px; margin: 10px"] ) }}
{!! csrf_field() !!}

    <div class="form-group col-lg-4" style="float:right">
      <label for="usr">صورة الاعلانات</label>
      <input type="file" class="form-control" id="usr" name="url">
    </div>
    <button type="submit" class="btn btn-default">اضافة</button>

  {{ Form::close() }}

  <div class="row" style="margin:0px 0px 0px 100px">
    @foreach($data as $image)
      <div class="col-xs-6 col-md-3 ">
        <a class="thumbnail">
          <img src="{{url($image->url)}}" alt="...">
        </a>
      </div>
    @endforeach
</div>
</div>

@endsection
