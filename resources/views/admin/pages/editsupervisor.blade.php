@extends('admin.layout.app')
@section('header')
<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
@section('content')

@if($errors->any())

<script>
swal({
  title: "تمت العملية",
  text: "{{$errors->first()}}",
  icon: "warning",
  buttons: false,
  dangerMode: false,
});
</script>
@endif
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin ">

<div class="modal-content col-lg-10 col-md-10 col-sm-10 col-xs-10">
  <form class="form-resp" method="post" action="{{url('/admin/edit/user/'.$data->id)}}">
    {!! csrf_field() !!}
    <input type="text" name="firstName" placeholder="الاسم الاول" value="{{$data->firstName}}">
    <input type="text" name="lastName" placeholder="الاسم الاخر" value="{{$data->lastName}}">
    <input type="email" name="email" placeholder="البريد الاليكتروني"  value="{{$data->email}}">
    <input type="text" name="phone" placeholder="رقم الجوال"  value="{{$data->phone}}">
    <input type="password" name="password" placeholder="كلمه المرور"  value="{{$data->password}}">

    <p>الصلاحيات :</p>
    <div class="block">

      @if($data->type_id == 2)
      <div class="radio">
             <label><input type="radio"  checked="checked"  value="2" name="type_id" style="margin-top:0px">ادمن</label>
      </div>
      <div class="radio">
        <label><input type="radio"  value="3" name="type_id" style="margin-top:0px">مشرف عام</label>
      </div>
      <div class="radio">
        <label><input type="radio"  value="4" name="type_id" style="margin-top:0px">مشرف</label>
      </div>
      @endif
      @if($data->type_id == 3)
      <div class="radio">
             <label><input type="radio"  value="2" name="type_id" style="margin-top:0px">ادمن</label>
      </div>
      <div class="radio">
        <label><input type="radio" checked="checked"  value="3" name="type_id" style="margin-top:0px">مشرف عام</label>
      </div>
      <div class="radio">
        <label><input type="radio"  value="4" name="type_id" style="margin-top:0px">مشرف</label>
      </div>
      @endif

      @if($data->type_id == 4)
      <div class="radio">
             <label><input type="radio"  value="2" name="type_id" style="margin-top:0px">ادمن</label>
      </div>
      <div class="radio">
        <label><input type="radio" value="3" name="type_id" style="margin-top:0px">مشرف عام</label>
      </div>
      <div class="radio">
        <label><input type="radio" checked="checked" value="4" name="type_id" style="margin-top:0px">مشرف</label>
      </div>
      @endif




    </div>
    <input type="submit" class="sub-btn" value="تعديل">

  </form>
</div>
</div>
@endsection
@section('jq')
<script src="{{url('admin/js/jquery-3.1.1.min.js')}}"></script>

@endsection
