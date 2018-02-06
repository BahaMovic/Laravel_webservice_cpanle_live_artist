@extends('admin.layouts.mainPage')

@section('header')

@endsection
@section('content')
<div class="container">

<table class="table table-hover" style="float:right ; width:94%">
<thead>
<tr>
<th>الرقم</th>
<th style="text-align:right">الاسم الاول</th>
<th style="text-align:right">الاسم الاخير</th>
<th style="text-align:right">البريد الالكتروني</th>
<th style="text-align:right">رقم الجوال</th>
<th style="text-align:right">الصلاحيات</th>
<th style="text-align:right">التعديل</th>



</tr>
</thead>
<tbody>
  @foreach($data as $row)
<tr>
<th scope="row">{{$row->id}}</th>
<td>{{$row->firstName}}</td>
<td>{{$row->lastName}}</td>
<td>{{$row->email}}</td>
<td>{{$row->phone}}</td>
<td>{{$row->type_id}}</td>
<td><a href="{{url('/api/delete/user/'.$row->id)}}">مسح</a></td>
</tr>

@endforeach
</tbody>
</table>
</div>
@endsection
