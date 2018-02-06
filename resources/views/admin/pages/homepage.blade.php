@extends('admin.layout.app')
@section('header')
<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
@endsection
@section('content')
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin dashbord-toggle">
			<div class="box-content-dashbords">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 par-box-content ">
					<div class="box-content-pro">
						<p>{{$provider}} مقدمين الخدمه</p>
					</div>
					<div class="box-content-pro-a">
						<a href="{{url('/admin/providers')}}">اعرض المزيد</a>
					</div>

				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 par-box-content ">
					<div class="box-content-pro">
						<p>{{$users}} طالبين الخدمه</p>
					</div>
					<div class="box-content-pro-a">
						<a href="{{url('/show/users')}}">اعرض المزيد</a>
					</div>

				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 par-box-content ">
					<div class="box-content-pro">
						<p>{{$supervisor}} المشرفيين</p>
					</div>
					<div class="box-content-pro-a">
						<a href="{{url('admin/supervisor')}}">اعرض المزيد</a>
					</div>

				</div>


			</div>
		</div>

@endsection
@section('jq')
<script src="{{url('admin/js/jquery-3.1.1.min.js')}}"></script>

@endsection
