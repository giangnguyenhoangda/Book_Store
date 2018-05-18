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
						<center><h3>Đơn hàng của bạn</h3></center>
					</div>
		<div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Thanh toán</th>
            <th>Trạng thái</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($listorder as $order)
            <tr class="odd gradeX">
              <td><a href="{{ route('getOrderDetail',$order->order_id) }}">{{ $order->order_id}}</a></td>
              <td>{{ $order->date_created}}</td>
              <td>{{number_format($order->total_money, 0, ',', '.')}} đ</td>

              @if($order->method_payment==0)
              <td>Tiền mặt</td>
              @else($order->method_payment==1)
              <td>ATM</td>
              @endif
              
              @if($order->status==-1)
              <td><span class="label label-info">Từ chối</span></td>
              @elseif($order->status==0)
              <td><span class="label label-info">Đang xử lý</span></td>
              @elseif($order->status==1)
              <td><span class="label label-success">Chấp nhận</span></td>
              @endif

            </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
	</div>
    {{ $listorder->links() }}
			</div>
		</div>
	</div>
	@endsection
</body>
</html>