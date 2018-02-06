@extends('admin.layout.app')
@section('header')
<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('content')

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

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin ">
			<!-- Large modal three -->
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" id="three" aria-labelledby="myLargeModalLabel" style="display: none;">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<form class="form-resp" method="post" action="{{url('/admin/add/user')}}">
              {!! csrf_field() !!}
							<input type="text" name="firstName" placeholder="الاسم الاول">
              <input type="text" name="lastName" placeholder="الاسم الاخر">
              <input type="email" name="email" placeholder="البريد الاليكتروني">
              <input type="text" name="phone" placeholder="رقم الجوال">
							<input type="password" name="password" placeholder="كلمه المرور">

							<p>الصلاحيات :</p>
							<div class="block">
								<div class="radio">
								 <label><input type="radio" value="2" name="type_id" style="margin-top:0px">ادمن</label>
							 </div>
							 <div class="radio">
								 <label><input type="radio" value="3" name="type_id" style="margin-top:0px">مشرف عام</label>
							 </div>
								<div class="radio">
									<label><input type="radio" value="4" name="type_id" style="margin-top:0px">مشرف</label>
								</div>

							</div>
							<input type="submit" class="sub-btn" value="اضافه">

						</form>
					</div>
				</div>
			</div>
			<!-- Large modal four -->
			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="four" aria-labelledby="myLargeModalLabel" style="display: none;">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content padding-5">
						<table class="table table-hover ">
							<thead>
								<tr>
									<th scope="col">رقم التسلسل</th>
									<th scope="col">اسم المستخدم</th>
									<th scope="col">البريد الاليكترونى</th>
									<th scope="col">الصلاحيات</th>
									<th scope="col">خصائص</th>
								</tr>
							</thead>
							<tbody>
                @foreach($data as $row)
								<tr>
									<td>{{$row->id}}</td>
									<td>{{$row->firstName}}</td>
									<td>{{$row->email}}</td>
									@if($row->type_id == 2)
									<td class="service-top">
										ادمن
									</td>
									@endif
									@if($row->type_id == 3)
									<td class="service-top">
										مشرف عام
									</td>
									@endif
									@if($row->type_id == 4)
									<td class="service-top">
										مشرف
									</td>
									@endif
									<td class="btns-prob">
										@if(Auth::user()->type_id == 2 )
										@if($row->active == 1)
												<a href="{{url('admin/stop/supervisor/'.$row->id)}}"><i class="fa fa-pause" title="وقف مؤقت"></i></a>
											@endif
											@if($row->active == 0)
												<a href="{{url('admin/stop/supervisor/'.$row->id)}}"><i class="fa fa-play" title="وقف مؤقت"></i></a>
											@endif
										@endif
										<!-- @if($row->active == 1)
				          <a href="{{url('/stop/provider/'.$row->id)}}"><i class="fa fa-pause" title="ايقاف مؤقت"></i></a>
				          @endif
				          @if($row->active == 0)
				          <a href="{{url('/stop/provider/'.$row->id)}}"><i class="fa fa-play" title="تشغيل"></i></a>

				          @endif -->
										<a href="{{url('/admin/edit/user/'.$row->id)}}"><i class="fa fa-edit" title="تعديل"></i></a>



									</td>
								</tr>
                @endforeach

							</tbody>
						</table>

					</div>
				</div>
			</div>

			<div class="box-content-dashbords">
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 par-box-content ">
				</div>
				@if(Auth::user()->type_id == 2)

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 par-box-content ">
					<div class="box-content-pro-user">
						<div class="pointer" data-toggle="modal" data-target="#three">
							<i class="fa fa-user-plus fa-5x"></i>
							<h2 class="bold">اضافه مشرف</h2>
						</div>
					</div>

				</div>
				@endif
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 par-box-content ">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 par-box-content ">
					<div class="box-content-pro-user">
						<div class="pointer" data-toggle="modal" data-target="#four">
							<i class="fa fa-users fa-5x"></i>
							<h2 class="bold">المشرفين</h2>
						</div>
					</div>

				</div>



			</div>
		</div>
@endsection
@section('jq')
<script src="{{url('admin/js/jquery-3.1.1.min.js')}}"></script>


@endsection
