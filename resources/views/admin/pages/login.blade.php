<html lang="en"><head>
		<meta charset="utf-8">
		<link rel="icon" href="">
		<title></title>
		<link rel="stylesheet" href="{{url('admin/css/bootstrap.css')}}">
		<link rel="stylesheet" href="{{url('admin/css/bootstrap-rtl.css')}}">
		<link rel="stylesheet" href="{{url('admin/css/font-awesome.min.css')}}">
		<link href="https://fonts.googleapis.com/css?family=Lalezar" rel="stylesheet">
		<link rel="stylesheet" href="{{url('admin/css/styel.css')}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- for explorer-->
        <meta name="viewport" content="width=device-width, initial-scale=1"><!-- first moblie meta for resposive-->
			<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
            <![endif]-->
	</head>
	<body>
		<!--                     start login-box                       -->
		<div class="login-box ">
			<div class="overlay-box-login">
				<div class="container">
					<img src="{{url('admin/css/pic/logoor.png')}}" alt="#" title="#" class="img-responsive center-block">
					<form class="login-box-form text-center" action="{{ url('/login') }}" method="post">
						<p>تسجيل الدخول </p>
						<input type="email" name="email" placeholder="الايميل" class="block">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
						<input type="password" name="password" placeholder="كلمه المرور" class="block">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
						<input type="submit" value="دخول" class="submit">
						<a href="#">لا استطيع الدخول ؟</a>



					</form>
				</div>
			</div>
		</div>
		<!--                     end login-box                       -->
		<script src="{{url('admin/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{url('admin/js/bootstrap.min.js')}}"></script>
        <script src="{{url('admin/js/plugins.js')}}"></script>





</body></html>
