@extends('admin.layouts.mainPage')

@section('header')

@endsection
@section('content')

<div class="container">
  <div class="col-lg-12" >
@foreach($data as $row)
<div class="row col-lg-4 pull-right">
  <div class="">
    <div class="thumbnail">
      <img src="{{url($row->url)}}" style="height:200px">
      <div class="caption">
        <h3>{{$row->provider->fullName}}</h3>
        <p>اسم المستخدم | {{$row->provider->username}}</p>
        <p><a href="{{url('admin/delete/images/'.$row->id)}}" onclick="return  confirm('؟هل تريد مسح هذه الصورة ')" class="btn btn-primary" role="button">مسح</a>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
</div>
@endsection
