@extends('layout.master')
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<script href="{{ asset('js/jquery.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
	@section('container')
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				@include('layout.elements.side_bar_userinfo')
			</div>
			<div class="col-sm-9">
				<div class="row">
					<div class="col-xs-12 col-sm-9">
    				<form class="form-horizontal" action="{{ route('postUpdateInformation') }}" method="POST">
				      <div class="panel panel-default">
				        <div class="panel-heading">
				        <h4 class="panel-title">Thông tin tài khoản</h4>
				        </div>
				        <div class="panel-body">
				        	@if (session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        	@endif
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
				          <div class="form-group">
				            <label class="col-sm-2 control-label">Tên đăng nhập</label>
				            <div class="col-sm-10">
				              <input type="text" class="form-control" value="{{ session('UserLogin')->user_name }}" name="username" required=" ">
				            </div>
				          </div>

				          <div class="form-group">
				            <label class="col-sm-2 control-label">Số điện thoại</label>
				            <div class="col-sm-10">
				              <input type="text" class="form-control" value="{{ session('UserLogin')->phone }}" name="phone" required=" ">
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-sm-2 control-label">Email</label>
				            <div class="col-sm-10">
				              <input type="email" class="form-control" value="{{ session('UserLogin')->email }}" name="email" required=" ">
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-sm-2 control-label">Địa chỉ</label>
				            <div class="col-sm-10">
				              <input type="text" class="form-control" value="{{ session('UserLogin')->address }}" name="address" required=" ">
				            </div>
				          </div>
				          
				          <div class="form-group">
				            <div class="col-sm-10 col-sm-offset-2">
				              <button type="submit" class="btn btn-primary">Cập nhật</button>
				            </div>
				          </div>
					
				        </div>
				      </div>
					</form>
					<form class="form-horizontal" method="POST" action="{{ route('postChangePassword') }}">
				      <div class="panel panel-default">
				        <div class="panel-heading">
				        <h4 class="panel-title">Đổi mật khẩu</h4>
				        </div>
				        <div class="panel-body">
				        	@if (session('passwordcorrect'))
                            <div class="alert alert-success">
                                {{ session('passwordcorrect') }}
                            </div>
                        	@endif
							@if (session('passwordincorrect'))
                            <div class="alert alert-danger">
                                {{ session('passwordincorrect') }}
                            </div>
                        	@endif

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
				          <div class="form-group">
				            <label class="col-sm-2 control-label">Mật khẩu hiện tại</label>
				            <div class="col-sm-10">
				              <input type="password" class="form-control" required=" " name="currentpassword">
				            </div>
				          </div>

				          <div class="form-group">
				            <label class="col-sm-2 control-label">Mật khẩu mới</label>
				            <div class="col-sm-10">
				              <input type="password" class="form-control" required=" " name="newpassword">
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-sm-10 col-sm-offset-2">
				              <button type="submit" class="btn btn-primary">Thay đổi</button>
				              <button type="reset" class="btn btn-default">Hủy</button>
				            </div>
				          </div>
				        
				        </div>
				      </div>

    				</form>

  					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
</body>
</html>