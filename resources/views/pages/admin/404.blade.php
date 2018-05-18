<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('css/admin-font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/admin-style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-style-responsive.css') }}" rel="stylesheet" />
</head>
  <body class="body-404">
    <div class="container">
      <section class="error-wrapper">
          <i class="icon-404"></i>
          <h1>404</h1>
          <h2>Trang Không Tồn Tại</h2>
          <p class="page-404">Đã xảy ra sự cố hoặc trang đó không tồn tại. <a href="{{ route('home') }}">Quay Lại Trang Chủ</a></p>
      </section>
    </div>
  </body>
</html>
