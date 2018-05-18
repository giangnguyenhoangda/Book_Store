<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đang Cập Nhật</title>
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin-bootstrap-reset.css') }}" rel="stylesheet">
	<!--external css-->
	<link href="{{ asset('css/admin-font-awesome.css') }}" rel="stylesheet" />

	<!-- coming soon styles -->
	<link href="{{ asset('css/admin-soon.css') }}" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="{{ asset('css/admin-style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin-style-responsive.css') }}" rel="stylesheet" />
</head>
<body class="cs-bg">
	<!-- START HEADER -->
	<section id="header">
		<div class="container">
			<header>
				<!-- HEADLINE -->
				<a class="logo floatless" href="index.html">Admin<span>Page</span></a>
				<h1 > Đang Cập Nhật...</h1>
				<br/>
				<p> Chức năng đang trong quá trình cập nhật. Vui lòng quay lại sau. </p>
			</header>
			<!-- START TIMER -->
			<div id="timer" data-animated="FadeIn">
				<p id="message"></p>
				<div id="days" class="timer_box"></div>
				<div id="hours" class="timer_box"></div>
				<div id="minutes" class="timer_box"></div>
				<div id="seconds" class="timer_box"></div>
			</div>
			<!-- END TIMER -->
			<div class="col-lg-4 col-lg-offset-4 mt centered">
				<h4> Đăng ký nhận thông báo khi hoàn thành</h4>
				<form class="form-inline" role="form">
					<div class="form-group">
						<label class="sr-only" for="exampleInputEmail2">Địa Chỉ Email</label>
						<input type="email" class="form-control" placeholder="Nhập địa chỉ email">
					</div>
					<button type="submit" class="btn btn-danger">Gửi</button>
				</form>            
			</div>

		</div>

	</section>
	<!-- END HEADER -->


	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>



	<script>
  // Thiết lập thời gian đích mà ta sẽ đếm
  var countDownDate = new Date("June 16, 2018 15:37:25").getTime();

  // cập nhập thời gian sau mỗi 1 giây
  var x = setInterval(function() {

    // Lấy thời gian hiện tại
    var now = new Date().getTime();

    // Lấy số thời gian chênh lệch
    var distance = countDownDate - now;

    // Tính toán số ngày, giờ, phút, giây từ thời gian chênh lệch
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // HIển thị chuỗi thời gian trong thẻ p
    document.getElementById("days").innerHTML = days + "<p>Ngày</p> ";
    document.getElementById("hours").innerHTML = hours + "<p>Giờ</p> ";
    document.getElementById("minutes").innerHTML = minutes + "<p>Phút<p> ";
    document.getElementById("seconds").innerHTML = seconds + "<p>Giây<p> ";

    // Nếu thời gian kết thúc, hiển thị chuỗi thông báo
    if (distance < 0) {
    	clearInterval(x);
    	document.getElementById("demo").innerHTML = "Thời gian đếm ngược đã kết thúc";
    }
}, 1000);
</script>
</body>
<!-- END BODY -->
</html>