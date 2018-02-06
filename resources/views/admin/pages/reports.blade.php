@extends('admin.layout.app')
@section('header')
<style>
input[type="search"] {
  background: white;
  color: #fff;
}

</style>
<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin dashbord-toggle">
  <!-- Large modal -->
  @foreach($providers as $provider)
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="two_{{$provider->id}}" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content toggle-table-top">
        <div class="det-prov">
          <img src="css/pic/background.jpg" alt="#" title="#" class="img-responsive center-block">
          <div class="block">
            <P class='inline-block'>الاسم :</P>
            <P class='inline-block'>{{$provider->username}} </P>
          </div>
          <div class="block">
            <P class='inline-block'>رقم الجوال :</P>
            <P class='inline-block'>{{$provider->phone}}</P>
          </div>
          <div class="block">
            <P class='inline-block'>الاسم التجارى :</P>
            <P class='inline-block'>{{$provider->tradeName}}</P>
          </div>
          <div class="block">
            <P class='inline-block'>البريد الاليكترونى :</P>
            <P class='inline-block'>{{$provider->email}}</P>
          </div>
          <div class="block">
            <P class='inline-block'>مكان وجود الخدمه :</P>
            <P class='inline-block'>{{$provider->address}}</P>
          </div>
          <div class="block">
            <P class='inline-block'>عن مقدم الخدمه :</P>
            <P class='inline-block'>{{$provider->about}}</P>
          </div>

          <br>

          <div class="owl-carousel owl-theme owl-one">
            @foreach($provider->images as $img)
              <div class="item"><img src="{{url($img->url)}}" alt="#" title="#"></div>
            @endforeach
          </div>
          <br>
          <br>
          <div class="owl-carousel owl-theme owl-two">
            <div class="item">
              <video width="290" controls>
                <source src="mov_bbb.mp4" type="video/mp4">
                <source src="mov_bbb.ogg" type="video/ogg">
                Your browser does not support HTML5 video.
              </video>

            </div>
          </div>
          <br>

        </div>
      </div>
    </div>
  </div>
  <!--	box-2		-->
    <!-- Large modal -->
    @endforeach
  <div class="top-2">
    @foreach($users as $user)
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="one_{{$user->id}}" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">اجمالى المدفوع</th>
          <th scope="col">الحاله</th>

          <th scope="col">تاريخ الحجز</th>
          <th scope="col">تاريخ عمليه الحجز</th>
          <th scope="col">الوقت</th>
          <th scope="col">الخدمات</th>
        </tr>
      </thead>
      <tbody>
        <?php $total = 0; ?>
        @foreach($user->orders as $order)
        <tr>
          <th scope="row">{{$order->total}}</th>
          <?php $total += $order->total; ?>
          @if($order->active == 1)<td>لم يتم الموافقة بعد</td>@endif
          @if($order->active == 0)<td>تم رفض الخدمة</td>@endif
          @if($order->active == 2)<td>تم الموافقة علي الخدمة</td>@endif
          <td>{{$order->date}}</td>
          <td>{{$order->created_at}}</td>
          <td>{{$order->time}}</td>

          <td class="service-top">الخدمات
            <div class="hidden-service">
              <?php $serv = explode(";",$order->services) ?>
              @for($i = 0 ; $i < sizeof($serv) ; $i++)
              <p>{{$serv[$i]}}</p>

              @endfor
            </div>
          </td>
        </tr>
      @endforeach

      </tbody>
    </table>
    <div class="text-center">
      <h2 class="inline-block"> اجمالى السعر المطلوب :</h2>
      <h2 class="inline-block">{{$total}}</h2>
      <button>طباعه</button>
    </div>
  </div>






    </div>
    </div>
    @endforeach
  </div>



  <div class="box-content-dashbords ">
    <form action="{{url('admin/get/orders')}}" method="post">
      <p class="inline-block"> من : </p>
      <input type="date" name="date_from">
      <p class="inline-block"> الى : </p>
      <input type="date" name="date_to">
      <select name="provider_id">
        <option value="">تحديد مقدم خدمة</option>

        @foreach($providers as $provider)
          <option value="{{$provider->id}}">{{$provider->username}}</option>
        @endforeach

      </select>
      <button type="submit" class="btn">ابحث <i class="fa fa-search"></i></button>
    </form>
    <br>
    <br>

    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th scope="col" >الاسم <span class="fa fa-angle-double-down" style="float:left"></span></th>
            <th scope="col" >رقم الجوال<span class="fa fa-angle-double-down" style="float:left"></span></th>
            <th scope="col" >الاسم التجارى <span class="fa fa-angle-double-down" style="float:left"></span></th>
            <th scope="col" >اسم طالب الخدمة</th>
            <th scope="col">اجمالي السعر<span class="fa fa-angle-double-down" style="float:left"></span></th>
            <th scope="col" >خصائص<span class="fa fa-angle-double-down" style="float:left"></span></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col" >الاسم <span class="fa fa-angle-double-down" style="float:left"></span></th>
            <th scope="col" >رقم الجوال<span class="fa fa-angle-double-down" style="float:left"></span></th>
            <th scope="col" >الاسم التجارى <span class="fa fa-angle-double-down" style="float:left"></span></th>
            <th scope="col" >اسم طالب الخدمة</th>
            <th scope="col">اجمالي السعر<span class="fa fa-angle-double-down" style="float:left"></span></th>
            <th scope="col" >خصائص<span class="fa fa-angle-double-down" style="float:left"></span></th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($orders as $row)
          <tr>
            <th scope="row">{{$row->provider->username}}</th>
            <td>{{$row->provider->phone}}</td>
            <td>{{$row->provider->tradeName}}</td>
            <td>
              {{$row->user->firstName}}
            </td>
            <td>
              {{$row->total}}
            </td>
            <td class="btns-prob">
              <i class="fa fa-eye" title="عرض" data-toggle="modal" data-target="#two_{{$row->provider->id}}"></i>
              <i class="fa fa-paste" title="الاوردرات"  data-toggle="modal" data-target="#one_{{$row->user->id}}"></i>
              <i class="fa fa-trash" title="حذف"></i>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
 $('#example').DataTable({"oLanguage": {

"sSearch": "بحث",
"sLengthMenu": "عرض _MENU_ طلبات",

}
  });
} );
</script>



  </div>
</div>


<!-- https://code.jquery.com/jquery-1.12.4.js
https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js -->


@endsection
