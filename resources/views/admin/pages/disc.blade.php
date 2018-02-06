@extends('admin.layout.app')
@section('header')
<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
@section('content')
@if(Auth::user()->type_id == 2)
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin dashbord-toggle">
  <div class="box-content-dashbords input">
  <form action="{{url('discount/code')}}" method="post">
    <input type="text" name="code" id="code" value="" readonly>
    <input type="text" name="from"  placeholder="من">
    <input type="text" name="to" placeholder="الى">
    <input type="number" name="disc" placeholder="نسبة الخصم"> %
    <button class="block btn" type="button" id="btnCode">كود جديد</button>
    <button class="btn" type="submit">أضافه</button>

  </form>

    <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">الكود</th>
          <th scope="col">أسم المستخدم</th>
          <th scope="col">طلبات من</th>
          <th scope="col">طلبات الي</th>
          <th scope="col">الخصم</th>
          <th scope="col">التاريخ</th>
          <th scope="col">خصائص</th>
        </tr>
      </thead>
      <tbody>
          @foreach($data as $code)
        <tr>

          <th scope="row">{{$code->code}}</th>
          <td>{{$code->user->firstName}}</td>
          <td>{{$code->ord_from}}</td>
          <td>{{$code->ord_to}}</td>
          <td>{{$code->discount}}-%</td>
          <td>{{$code->created_at}}</td>
          <td class="btns-prob">

            <a href="{{url('delete/descount/'.$code->id)}}"><i class="fa fa-trash" title="حذف"></i></a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>



  </div>
</div>

@else
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin dashbord-toggle">

<script>
swal({
  title: "تحذير",
  text: "لا يوجد لديك صلاحية لروئية هذه الصفحة",
  icon: "warning",
  buttons: true,
  dangerMode: true,
});
</script>
</div>
@endif
@endsection
@section('jq')
<script src="{{url('admin/js/jquery-3.1.1.min.js')}}"></script>

@endsection
