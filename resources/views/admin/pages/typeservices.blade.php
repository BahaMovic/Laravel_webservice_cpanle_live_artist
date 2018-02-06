@extends('admin.layout.app')
@section('header')
<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
@section('content')
@if(Auth::user()->type_id == 2)
@if($errors->any())
<script>

swal({
  title: "تنبيه",
  text: "{{$errors->first()}}",
  icon: "warning",
  buttons: false,
  dangerMode: false,
});
</script>
@endif
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin dashbord-toggle">
  <!-- Large modal -->
  <div class="modal fade bs-example-modal-lg" id="one" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content toggle-table-top">
        <form class="form-inline" method="post" action="{{url('admin/add/type')}}" style="margin-right:300px">
          {{csrf_field()}}

<div class="form-group">
  <label for="exampleInputName2">عنوان الخدمة</label>
  <input type="text" class="form-control" name="title" id="exampleInputName2" placeholder="نوع الخدمة">
</div>

<button type="submit" class="btn btn-default">اضافة</button>
</form>
      </div>
    </div>
  </div>





@foreach($data as $row)
  <div class="modal fade bs-example-modal-lg" id="one_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content toggle-table-top">
        <form class="form-inline" method="post" action="{{url('admin/edit/type/'.$row->id)}}" style="margin-right:300px">
          {{csrf_field()}}

<div class="form-group">
  <label for="exampleInputName2">عنوان الخدمة</label>
  <input type="text" class="form-control" name="title" value="{{$row->title}}" id="exampleInputName2" placeholder="نوع الخدمة">
</div>

<button type="submit" class="btn btn-default">تعديل</button>
</form>
      </div>
    </div>
  </div>
@endforeach












  <div class="box-content-dashbords">
    <a class="fa fa-paste" title="الاوردرات"  data-toggle="modal" data-target="#one">اضافة نوع خدمة جديدة</a>

    <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">الرقم</th>
          <th scope="col">الاسم</th>
          <th scope="col">خصائص</th>
        </tr>
      </thead>
      <tbody>
          @foreach($data as $row)
        <tr>
<!--							   والاوردرات فى جدول والاوردرات والخدمات بنفس الطريقه-->

          <th scope="row">{{$row->id}}</th>
          <td>{{$row->title}}</td>

          <td class="btns-prob">
            <i class="fa fa-cogs" title="تعديل" data-toggle="modal" data-target="#one_{{$row->id}}"></i>

            <a href="{{url('admin/delete/types/'.$row->id)}}"><i class="fa fa-trash" title="حذف"></i></a>
          </td>
        </tr>
        @endforeach


      </tbody>
    </table>



  </div>
</div>










</div>
<!--                     end box-dashbord-all                       -->
<!--                     end dashbord-page                       -->







@else
<h1 style="margin-right:300px">ليس لديك صلاحية لروئية هذه الصفحة</h1>
@endif
@endsection
@section('jq')
<script src="{{url('admin/js/jquery-3.1.1.min.js')}}"></script>

@endsection
