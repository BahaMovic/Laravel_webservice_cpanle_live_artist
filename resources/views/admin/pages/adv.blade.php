@extends('admin.layout.app')
@section('header')
<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
@endsection
@section('content')
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin dashbord-toggle">
  <!-- Large modal -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content toggle-table-top">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">اجمالى السعر</th>
              <th scope="col">الحاله</th>
              <th scope="col">مقدم الخدمه</th>
              <th scope="col">تاريخ الحجز</th>
              <th scope="col">الوقت</th>
              <th scope="col">العنوان</th>
              <th scope="col">الخدمات</th>
              <th scope="col">تاريخ عمليه الحجز</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">10</th>
              <td><i class="fa fa-close"></i></td>
              <td>مقدم</td>
              <td>10/10/2015</td>
              <td>10:30</td>
              <td>العنوان العنوان العنوان</td>
              <td class="service-top">الخدمات
                <div class="hidden-service">
                  <p>خدمه 1</p>
                  <p>خدمه 2</p>
                  <p>خدمه 3</p>
                  <p>خدمه 4</p>
                  <p>خدمه 5</p>
                </div>
              </td>
              <td>10/10/2015</td>
            </tr>
            <tr>
              <th scope="row">10</th>
              <td><i class="fa fa-check"></i></td>
              <td>مقدم</td>
              <td>10/10/2015</td>
              <td>10:30</td>
              <td>العنوان العنوان العنوان</td>
              <td class="service-top">الخدمات
                <div class="hidden-service">
                  <p>خدمه 1</p>
                  <p>خدمه 2</p>
                  <p>خدمه 3</p>
                  <p>خدمه 4</p>
                  <p>خدمه 5</p>
                </div>
              </td>
              <td>10/10/2015</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="box-content-dashbords">
    <h2 class="text-center">الصفحه الرئيسيه</h2>
    <br>
    @if(Auth::user()->type_id == 2)
    <div class="ads-sitting">
      <form action="{{URL::to('admin/get/adv')}}"/edit/photo" method="post" files="true" style="margin-top:-20px ; margin-left: 80%; index-z:1212"  enctype="multipart/form-data">
      {!! csrf_field() !!}
      <input type="file" name="url">
      <button type="submit">اضافه</button>
        </form>
    </div>
    @endif
    <br>
    <br>
    <br>
    <br>
    <div class="owl-carousel owl-theme owl-three">
      @foreach($data as $row)
      <div class="item"><img src='{{url($row->url)}}' alt="#" title="#">
        <a href="{{url('/delete/adv/image/'.$row->id)}}">مسح الاعلان</a>
      </div>
      @endforeach
    </div>
    <br>
    <br>

    <br>
    <br>
    <br>

  </div>
</div>


@endsection
@section('jq')
<script src="{{url('admin/js/jquery-3.1.1.min.js')}}"></script>

@endsection
