@extends('admin.layout.app')
@section('header')
<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
@endsection
@section('content')
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin dashbord-toggle">
  <!-- Large modal -->
    @foreach($data as $row)
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="two_{{$row->id}}" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content toggle-table-top">
        <div class="det-prov">
          <img src="{{url($row->image)}}" alt="#" title="#" class="img-responsive center-block">
          <div class="block">
            <P class='inline-block'>ألاسم : {{$row->username}} </P>
          </div>
          <div class="block">
            <P class='inline-block'>رقم الجوال :</P>
            <P class='inline-block'>{{$row->phone}} </P>
          </div>
          <div class="block">
            <P class='inline-block'>الاسم التجارى :</P>
            <P class='inline-block'>{{$row->tradeName}}</P>
          </div>
          <div class="block">
            <P class='inline-block'>البريد الاليكترونى :</P>
            <P class='inline-block'>{{$row->email}}</P>
          </div>
          <div class="block">
            <P class='inline-block'>مكان وجود الخدمه :</P>
            <P class='inline-block'>{{$row->address}}</P>
          </div>
          <div class="block">
            <P class='inline-block'>عن مقدم الخدمه :</P>
            <P class='inline-block'>{{$row->about}}</P>
          </div>

          <br>

          <div class="owl-carousel owl-theme owl-one">
            @foreach($row->images as $image)
              <div class="item"><img src="{{url($image->url)}}" alt="{{$image->url}}" title="{{$image->url}}" style="height:100px">
                @if(Auth::user()->type_id == 2 || Auth::user()->type_id == 3 )

              <a href="{{url('/delete/image/'.$image->id)}}" style="padding:20px">مسح الصورة</a>
              @endif
              </div>

            @endforeach
          </div>
          <br>
          <br>
          <div class="owl-carousel owl-theme owl-two">
              @foreach($row->videos as $video)
            <div class="item">

              <video width="290" controls>herteW
                <source src="{{url($video->url)}}" type="video/mp4">


              </video>
              @if(Auth::user()->type_id == 2 || Auth::user()->type_id == 3 )

<a href="{{url('/delete/image/'.$image->id)}}">مسح الصورة</a>
  @endif

            </div>
              @endforeach
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
    @foreach($data as $row)
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="one_{{$row->id}}" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">اجمالى المدفوع</th>

          <th scope="col">اسم طالب الخدمه</th>
          <th scope="col">تاريخ الحجز</th>
          <th scope="col">تاريخ عمليه الحجز</th>
          <th scope="col">الوقت</th>
          <th scope="col">الخدمات</th>
          <th scope="col">الحالة</th>

        </tr>
      </thead>
      <tbody>
        <?php $total = 0; ?>
        @foreach($row->orders as $ord)
        <tr>
          <th scope="row">{{$ord->total}}</th>

          <td>{{$ord->user->firstName}} </td>
          <td>{{$ord->date}}</td>
          <td>{{$ord->created_at}}</td>
          <td>{{$ord->time}}</td>
          <td class="service-top">الخدمات
            <div class="hidden-service">
              <?php $serv = explode(";",$ord->services) ?>
              @for($i = 0 ; $i < sizeof($serv) ; $i++)
              <p>{{$serv[$i]}}</p>

              @endfor
            </div>
          </td>
          @if($ord->old_date == 1)
          <td>لم تمت الخدمة بعد</td>
          @endif
          @if($ord->old_date == 2)
          <td>تم الانتهاء من الخدمة</td>
            <?php $total += $ord->total; ?>
          @endif
          @if($ord->old_date == 0)
          <td>تم رفض الخدمة</td>
          @endif

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



  <div class="box-content-dashbords">
    <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">الاسم</th>
          <th scope="col">رقم الجوال</th>
          <th scope="col">الاسم التجارى</th>
          <th scope="col">التقييم</th>
          <th scope="col">خصائص</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $row)
        <tr>
          <th scope="row">{{$row->username}}</th>
          <td>{{$row->phone}}</td>
          <td>{{$row->tradeName}}</td>
          <td>
            <div class="stars">
          @for($i = 0 ; $i < intval($row->rate) ; $i++)
            <a href=""><i class="fa fa-star"></i></a>
          @endfor
            @for($x = intval($row->rate) ; $x < 5 ; $x++)
            <a href="{{url('admin/edit/rate/'.$x.'/'.$row->id)}}"><i class="fa fa-star-o"></i></a>
            @endfor


          </div>
          </td>
          <td class="btns-prob">
            <i class="fa fa-eye" title="عرض" data-toggle="modal" data-target="#two_{{$row->id}}"></i>
            <i class="fa fa-paste" title="الاوردرات"  data-toggle="modal" data-target="#one_{{$row->id}}"></i>
            @if(Auth::user()->type_id == 2 || Auth::user()->type_id == 3 )
            @if($row->active == 1)
          <a href="{{url('/stop/provider/'.$row->id)}}"><i class="fa fa-pause" title="ايقاف مؤقت"></i></a>
          @endif
          @if($row->active == 0)
          <a href="{{url('/stop/provider/'.$row->id)}}"><i class="fa fa-play" title="تشغيل"></i></a>

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
