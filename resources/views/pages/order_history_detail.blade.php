@extends('layout.master')
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style_user_information.css') }}">
	<script href="{{ asset('js/jquery.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <style type="text/css">
    	.table-responsive{margin-top:25px;}
    </style>
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
					<div>
						<center><h3>Chi tiết đơn hàng</h3></center>
					</div>
		<div class="table-responsive">
      <table class="table table-bordered">
        <thead >
          <tr >
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($detail as $subdetail)
            <tr class="odd gradeX">
              <td>{{ $subdetail->book_name}}</td>
              <td>{{ $subdetail->quantity}}</td>
              <td>{{number_format($subdetail->price, 0, ',', '.')}} đ</td>
            </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
	</div>
   
			</div>
		</div>
	</div>
	@endsection
</body>
</html>