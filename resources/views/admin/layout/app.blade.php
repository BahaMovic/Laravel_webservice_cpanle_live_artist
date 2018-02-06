<html lang="en"><head>
	<meta charset="utf-8">
	<link rel="icon" href="">
	<title></title>
	<link rel="stylesheet" href="{{url('admin/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{url('admin/css/bootstrap-rtl.css')}}">
	<link rel="stylesheet" href="{{url('admin/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('admin/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{url('admin/css/owl.theme.default.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Lalezar" rel="stylesheet">
	@yield('header')

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- for explorer-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- first moblie meta for resposive-->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
            <![endif]-->
</head>

<body>
	<!--                     start dashbord-page                       -->
	<!--                     start top-nav                       -->
	<div class="top-nav">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 dark-blue right-menu">
			<i class="fa fa-bars " aria-hidden="true"></i>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<img src="{{url('admin/css/pic/logoor.png')}}" alt="#" title="#" class="img-responsive">
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
		</div>
	</div>
	<!--                     end top-nav                       -->
	<!--                     start box-dashbord-all                       -->
	<div class="box-dashbord-all">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding no-margin brown right-menu">
			<input type="search" placeholder="البحث">
			<a href="{{url('admin/home')}}" class="section-container block">
				<div class="box-content-sections">
						<i class="fa fa-home"></i>
						<p class="inline-block">الصفحه الرئيسيه</p>
					</div>
			</a>
			<a href="{{url('admin/supervisor')}}" class="section-container block">
				<div class="box-content-sections ">
					<i class="fa fa-users"></i>
					<p class="inline-block">المشرفين</p>
				</div>
			</a>
			<a href="{{url('/admin/providers')}}" class="section-container block">
				<div class="box-content-sections ">
					<i class="fa fa-user"></i>
					<p class="inline-block">مقدمين الخدمه</p>
				</div>
			</a>
			<a href="{{url('admin/get/types')}}" class="section-container block">
				<div class="box-content-sections ">
					<i class="fa fa-edit"></i>
					<p class="inline-block">نوع الخدمة</p>
				</div>
			</a>
			<a href="{{url('/show/users')}}" class="section-container block">
				<div class="box-content-sections ">
					<i class="fa fa-male"></i>
					<p class="inline-block">طالبين الخدمه</p>
				</div>
			</a>
			@if(Auth::user()->type_id == 2)

			<a href="{{url('admin/get/orders')}}" class="section-container block">
				<div class="box-content-sections ">
					<i class="fa fa-paperclip"></i>
					<p class="inline-block">التقارير</p>
				</div>
			</a>
			@endif
			<a href="{{url('/admin/get/adv')}}" class="section-container block">
				<div class="box-content-sections ">
					<i class="fa fa-wrench"></i>
					<p class="inline-block">الاعلانات</p>
				</div>
			</a>
			@if(Auth::user()->type_id == 2)
			<a href="{{url('discount/code')}}" class="section-container block">
				<div class="box-content-sections ">
					<i class="fa fa-qrcode"></i>
					<p class="inline-block">كود الخصم</p>
				</div>
			</a>
			@endif
			<div class="rep-box">
				@if(Auth::user()->type_id == 2)

				<a class="section-container block">
					<div class="box-content-sections ">
						<i class="fa fa-comment"></i>
						<p class="inline-block">الرسائل</p>
					</div>
				</a>
				<div class="submnue">
					@foreach($usersSuper as $us)
					<a href="{{url('admin/messageadmin/'.$us->id)}}" class="block box-content-sections ">{{$us->firstName}}
						<div style="width:20px;height:20px;background:white;color:black;text-align:center;border-radius:50%">
							{{$us->countMessages}}
						</div>
					</a>

					@endforeach
				</div>
				@endif
				@if(Auth::user()->type_id > 2)

				<a class="section-container block" href="{{url('admin/message/'.Auth::user()->id.'/11')}}">
					<div class="box-content-sections ">
						<i class="fa fa-comment"></i>
						<p class="inline-block">رسايلي</p>
					</div>
				</a>
				@endif

			</div>

      <a href="{{ url('/logout') }}" class="section-container block"   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
				<div class="box-content-sections">
						<i class="fa fa-sign-out"></i>
						<p class="inline-block">تسجيل الخروج</p>
					</div>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
			</a>
		</div>

      @yield('content')
	</div>

@yield('jq')
<script src="{{url('admin/js/bootstrap.min.js')}}"></script>
	<script src="{{url('admin/js/owl.carousel.js')}}"></script>
	<script src="{{url('admin/js/plugins.js')}}"></script>





</body></html>
