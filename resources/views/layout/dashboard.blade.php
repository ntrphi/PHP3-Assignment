<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
@include('dashboard.top-asset')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

        @include('dashboard.header')
          <!-- Left side column. contains the logo and sidebar -->
        @include('dashboard.aside')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                @yield('pagename')
              </h1>
            </section>

            <!-- Main content -->
              @yield('content')
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
@include('dashboard/bottom-asset')
@yield('js')
</body>
</html>
