@extends('admin.layouts.mainPage')

@section('header')

@endsection
@section('content')
<div class="container">

<table class="table table-hover" style="float:right ; width:90%">
<thead>
<tr>
<th>الرقم</th>
<th style="text-align:right"> الاسم</th>
<th style="text-align:right">البريد الالكتروني</th>
<th style="text-align:right">رقم الجوال</th>

<th style="text-align:right">الاسم التجاري</th>
<th style="text-align:right">العنوان</th>
<th style="text-align:right">التعديل</th>
<th style="text-align:right">الطلبات</th>



</tr>
</thead>
<tbody>
  @foreach($data as $row)
<tr>
<th scope="row">{{$row->id}}</th>
<td>{{$row->fullName}}</td>

<td>{{$row->email}}</td>
<td>{{$row->phone}}</td>
<td>{{$row->tradeName}}</td>
<td>{{ substr($row->address,0,50)}}</td>


<td><a href="{{url('/api/delete/provider/'.$row->id)}}">مسح</a> | <a href="{{url('/api/delay/provider/'.$row->id)}}">ايقاف مؤقت</a></td>
<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$row->id}}" data-whatever="@mdo">طلبان المستخدم</button></td>
</tr>

@endforeach
</tbody>
</table>
</div>
  @foreach($data as $row)
<div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1000px; margin-right:-200px">
      <table class="table table-hover" style="float:right">
      <thead>
      <tr>
      <th style="text-align:right">الرقم</th>
      <th style="text-align:right"> اجمالي السعر</th>
      <th style="text-align:right">الحالة </th>
      <th style="text-align:right">اسم مقدم الخدمة</th>
      <th style="text-align:right">تاريخ الحجز</th>
      <th style="text-align:right">الوقت</th>
      <th style="text-align:right">العنوان</th>
      <th style="text-align:right">الخدمات</th>
      <th style="text-align:right">تاريخ عملية الحجز</th>
      <th>
      </tr>
      </thead>
      <tbody>

          @foreach($row->orders as $list)
        <tr>
        <th scope="row">{{$list->id}}</th>
        <td>{{$list->total}}</td>
        <td>{{$list->active}}</td>
        <td>{{$list->user->fullName}}</td>
        <td>{{$list->date}}</td>
        <td>{{$list->time}}</td>
        <td>{{$list->address}}</td>
        <td>{{$list->services}}</td>
        <td>{{$list->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
      </table>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>

      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
