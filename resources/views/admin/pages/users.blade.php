@extends('admin.layout.app')
@section('header')
<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
@endsection
@section('content')
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin dashbord-toggle">
  <!-- Large modal -->
  @foreach($data as $row)
  <div class="modal fade bs-example-modal-lg" id="one_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content toggle-table-top">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">اسم مقدم الخدمه</th>
              <th scope="col">التاريخ</th>
              <th scope="col">الوقت</th>
              <th scope="col">تاريخ الحجز</th>
              <th scope="col">الحالة</th>
              <th scope="col">السعر</th>
              <th scope="col">الخدمات</th>
            </tr>
          </thead>
          <tbody>
            <?php $total = 0; ?>
            @foreach($row->orders as $ord)
            <tr>
              <td>{{$ord->provider->username}} </td>
              <td>{{$ord->date}}</td>
              <td>{{$ord->time}} </td>
              <td>{{$ord->created_at}}</td>
              @if($ord->old_date == 1)
              <td>لم تمت الخدمة بعد</td>
              @endif
              @if($ord->old_date == 2)
              <td>تم الانتهاء من الخدمة</td>

              @endif
              @if($ord->old_date == 0)
              <td>تم رفض الخدمة</td>
              @endif
              <td>{{$ord->total}}</td>
              <td class="service-top">الخدمات
                <div class="hidden-service">
                  <?php $serv = explode(";",$ord->services) ?>
                  @for($i = 0 ; $i < sizeof($serv) ; $i++)
                  <p>{{$serv[$i]}}</p>

                  @endfor
                </div>
              </td>
            </tr>
              @if($ord->old_date > 1)
              <?php $total += $ord->total; ?>
              @endif
            @endforeach


          </tbody>
        </table>
        <div class="text-center top-2">
          <h2 class="inline-block"> اجمالى السعر المطلوب :</h2>
          <h2 class="inline-block">{{$total}}</h2>

        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div class="box-content-dashbords">
    <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">الاسم </th>
          <th scope="col">البريد الاليكترونى</th>
          <th scope="col">رقم الجوال</th>
          <th scope="col">العنوان</th>
          <th scope="col">خصائص</th>
        </tr>
      </thead>
      <tbody>
        <tr>
<!--							   والاوردرات فى جدول والاوردرات والخدمات بنفس الطريقه-->
@foreach($data as $row)
          <th scope="row">{{$row->firstName}}</th>
          <td>{{$row->email}}</td>
          <td>{{$row->phone}}</td>
          <td>{{$row->address}}</td>
          <td class="btns-prob">
            <i class="fa fa-paste" title="الطلبات"  data-toggle="modal" data-target="#one_{{$row->id}}"></i>

              @if(Auth::user()->type_id == 2 || Auth::user()->type_id == 3 )
              @if($row->active == 1)
            <a href="{{url('/stop/user/'.$row->id)}}"><i class="fa fa-pause" title="ايقاف مؤقت"></i></a>
            @endif
            @if($row->active == 0)
            <a href="{{url('/stop/user/'.$row->id)}}"><i class="fa fa-play" title="تشغيل"></i></a>

            @endif
            @endif

          </td>
        </tr>
        @endforeach

      </tbody>
    </table>



  </div>
</div>
@endsection
@section('jq')
<script src="{{url('admin/js/jquery-3.1.1.min.js')}}"></script>

@endsection
