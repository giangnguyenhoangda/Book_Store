<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lock Screen</title>
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin-bootstrap-reset.css') }}" rel="stylesheet">
	<!--external css-->
	<link href="{{ asset('css/admin-font-awesome.css') }}" rel="stylesheet" />
	<!-- Custom styles for this template -->
	<link href="{{ asset('css/admin-style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin-style-responsive.css') }}" rel="stylesheet" />
</head>
<body class="lock-screen" onload="startTime()">
    <div class="lock-wrapper">
        <div id="time"></div>
        <div class="lock-box text-center">
            <h1>{{ $admin->first_name.' '.$admin->last_name }}</h1>
            <span class="locked">Đã Khóa</span>

            <form role="form" class="form-inline" action="{{ route('postAdminLoginFromLockScreen') }}" method="post">
                <div class="form-group col-lg-12 aform">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                	<input type="hidden" name="user_name" value="{{ $admin->user_name }}">
                	<input type="hidden" name="admin_id" value="{{ $admin->admin_id }}">
                    <input type="password" placeholder="Mật Khẩu" name="password" class="form-control lock-input">
                    <button style="float: left;" class="btn btn-lock" type="submit">
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </form>
            <p><span >@if (session('thongbao'))
            	{{ session('thongbao') }}
            @else
            	&nbsp;
            @endif</span></p>
        </div>
    </div>
    <script>
        function startTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('time').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){startTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>
</body>
</html>