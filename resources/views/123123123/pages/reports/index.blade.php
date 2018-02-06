@extends('admin.layouts.mainPage')

@section('header')

@endsection
@section('content')
<div class="container">
  <div class="row" style="width:90%">
    <form>
      <div class="form-group col-lg-4">
        <label for="usr">المقدم</label>
        <select class="form-control" id="sel1">
          @foreach($providers as $row)
          <option value="{{$row->id}}">{{$row->fullName}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-lg-4">
        <label for="usr">الوقت الي </label>
        <input type="date" class="form-control" id="usr">
      </div>
      <div class="form-group col-lg-4">
        <label for="usr">الوقت من</label>
        <input type="date" class="form-control" id="usr">
      </div>


    </form>
  </div>
</div>

<table class="table table-hover" style="float:right ; width:94%">
<thead>
<tr>
<th>الرقم</th>
<th style="text-align:right">السعر الاجمالي</th>
<th style="text-align:right">الحالة</th>
<th style="text-align:right">التاريخ</th>
<th style="text-align:right">الوقت</th>

<th style="text-align:right">العنوان</th>
<th style="text-align:right">اسم مقدم الخدمة</th>
<th style="text-align:right">اسم طالب الخدمة</th>
<th style="text-align:right"> الخدمات</th>
<th style="text-align:right">مسح</th>


</tr>
</thead>
<tbody>
  @foreach($data as $row)
<tr>
<th scope="row">{{$row->id}}</th>
<td>{{$row->total}}</td>
<td>{{$row->active}}</td>
<td>{{$row->date}}</td>
<td>{{$row->time}}</td>
<td>{{$row->address}}</td>
<td>{{$row->provider->fullName}}</td>
<td>{{$row->user->fullName}}</td>
<td>{{$row->services}}</td>
<td><a href="{{url('/api/delete/order/'.$row->id)}}">مسح</a></td>
</tr>

@endforeach
</tbody>
</table>
</div>

@endsection
