<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:56 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Trang Quản Trị - Đăng Nhập</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin-bootstrap-reset.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('css/admin-font-awesome.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/admin-style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin-style-responsive.css') }}" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="login-body">

  <div class="container">

    <form class="form-signin" action="{{ route('postAdminLogin') }}" method="post">
      <h2 class="form-signin-heading">Đăng Nhập</h2>
      <div class="login-wrap">
        @if (session('thongbao'))
        <div class="alert alert-warning">
          {{ session('thongbao') }}
        </div>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="user_name" class="form-control" placeholder="User ID" autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Nhớ mật khẩu
          <span class="pull-right">
            <a data-toggle="modal" href="#myModal"> Quên mật khẩu?</a>

          </span>
        </label>
        <button class="btn btn-lg btn-login btn-block" type="submit">Đăng nhập</button>
        <p>hoặc bạn có thể đăng nhập qua</p>
        <div class="login-social-link">
          <a href="" class="facebook">
            <i class="fa fa-facebook"></i>
            Facebook
          </a>
          <a href="" class="twitter">
            <i class="fa fa-twitter"></i>
            Twitter
          </a>
        </div>
        <div class="registration">
          Bạn chưa có mật khẩu? Liện hệ quản trị viên
        </div>

      </div>

      <!-- Modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Quên mật khẩu ?</h4>
            </div>
            <div class="modal-body">
              <p>Nhập email để khôi phục mật khẩu.</p>
              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

            </div>
            <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Hủy bỏ</button>
              <button class="btn btn-success" type="button">Quên mật khẩu</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal -->

    </form>

  </div>



  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>


</body>

<!-- Mirrored from thevectorlab.net/flatlab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:57 GMT -->
</html>
