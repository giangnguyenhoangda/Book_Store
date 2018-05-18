@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
	<!-- page start-->
	<div class="row">
		<aside class="profile-nav col-lg-3">
			<section class="panel">
				<div class="user-heading round">
					<a href="#">
						<img src="{{ asset('images/40848077334_db3b7055a3_o.jpg') }}" alt="">
					</a>
					<h1>{{ $admin->first_name.' '.$admin->last_name}}</h1>
					<p>{{ $admin->email }}</p>
				</div>
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="{{ route('getProfile',$admin->admin_id) }}"> <i class="fa fa-user"></i> Thông Tin</a></li>
					<li><a href="{{ route('getContentProEdit',$admin->admin_id) }}"> <i class="fa fa-edit"></i> Sửa Thông Tin</a></li>
				</ul>
			</section>
		</aside>
		<aside class="profile-info col-lg-9">
			<section class="panel">
				<div class="bio-graph-heading">
					Cuộc đời đẹp khi bạn chơi nhiều.
				</div>
				<div class="panel-body bio-graph-info">
					<h1>Giới Thiệu</h1>
					<div class="row">
						<div class="bio-row">
							<p><span>Tên </span>:{{ ' '.$admin->first_name }}</p>
						</div>
						<div class="bio-row">
							<p><span>Họ </span>:{{ ' '.$admin->last_name }}</p>
						</div>
						<div class="bio-row">
							<p><span>Địa Chỉ </span>: {{ ' '.$admin->address }}</p>
						</div>
						<div class="bio-row">
							<p><span>Sinh Nhật</span>: 26/11/1997</p>
						</div>
						<div class="bio-row">
							<p><span>Email </span>:{{ ' '.$admin->email }}</p>
						</div>
						<div class="bio-row">
							<p><span>Điện Thoại </span>:{{ ' '.$admin->phone }}</p>
						</div>
					</div>
				</div>
			</section>
		</aside>
	</div>
@endsection