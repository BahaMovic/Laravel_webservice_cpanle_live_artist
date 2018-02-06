<html dir="rtl"><head>
    <meta charset="UTF-8">
    <title>Admin-@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/AdminLTE.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    @yield('header')
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('dist/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Emic</b>ADS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">

          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
          <!-- Sidebar user panel -->

          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="float: right;">
            <li class="header">القائمة الرئيسية</li>

            <li >
              <a href="{{url('/admin/users')}}">
                <i class="fa fa-th"></i>
                <span>المستخدمين</span>
                <small class=""></small>
              </a>
            </li>


             <li >
              <a href="{{url('/admin/providers')}}">
                <i class="fa fa-th"></i> <span>مقدمي الخدمات</span> <small class=""></small>
              </a>
            </li>

            <li>
              <a href="{{url('/admin/orders')}}">
                <i class="fa fa-th"></i> <span>التقارير</span> <small class=""></small>
              </a>
            </li>
            <li>
              <a href="{{url('admin/supervisers')}}">
                <i class="fa fa-th"></i> <span>المشرفين</span> <small class=""></small>
              </a>
            </li>
            <li>
              <a href="{{url('admin/show/doctors')}}">
                <i class="fa fa-th"></i> <span>أطباء</span> <small class=""></small>
              </a>
            </li>

            <li>
              <a href="{{url('admin/show/specialty')}}">
                <i class="fa fa-th"></i> <span>التخصصات</span> <small class=""></small>
              </a>
            </li>

            <li>
              <a href="{{url('admin/show/booking')}}">
                <i class="fa fa-th"></i> <span>الحجوزات</span> <small class=""></small>
              </a>
            </li>


            <li>
              <a href="{{url('admin/show/images')}}">
                <i class="fa fa-th"></i> <span>الصور</span> <small class=""></small>
              </a>
            </li>

            <li>
              <a href="{{url('admin/show/news')}}">
                <i class="fa fa-th"></i> <span>الاخبار</span> <small class=""></small>
              </a>
            </li>

            <li>
              <a href="{{url('admin/show/feedbacks')}}">
                <i class="fa fa-th"></i> <span>التعليقات</span> <small class=""></small>
              </a>
            </li>

            <li>
              <a href="{{url('admin/edit/contact/en')}}">
                <i class="fa fa-th"></i> <span>اتصل بنا</span> <small class=""></small>
              </a>
            </li>

            <li>
              <a href="{{url('admin/show/messages')}}">
                <i class="fa fa-th"></i> <span>الرسايل</span> <small class=""></small>
              </a>
            </li>

            <li>
              <a href="{{url('admin/edit/social/en')}}">
                <i class="fa fa-th"></i> <span>شبكات التواصل</span> <small class=""></small>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 1096px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="float: right; ">

            <small>@yield('description')</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box" style="top:25px;">
            <div class="box-header with-border">
              <h3 class="box-title" style="float: right;">@yield('title')</h3>
              <div class="box-tools" >

              </div>
            </div>
            <div class="box-body" style="float: right;">
              @yield('content')
            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright © 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg" style="position: fixed; height: auto;"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ url('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ url('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('dist/js/demo.js') }}"></script>


</body></html>
