@extends('layout.master')
@section('container')
<div class="container">
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="{{ asset('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ol>
		</div>
	</div>
</div>
<div class="checkout">
	<div class="container">
		<h3 class="animated wow slideInLeft animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">Your shopping cart contains: <span>{{ $cart ? $cart->totalQty : 0 }} Products</span></h3>
		<div class="checkout-right animated wow slideInUp animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>SL No.</th>	
						<th style="width: 10%">Product</th>
						<th style="width: 40%">Product Name</th>
						<th>Quality</th>
						<th>Service Charges</th>
						<th>Price</th>
						<th>Remove</th>
					</tr>
				</thead>
				<tbody>
					@if($cart and $items)

					@foreach($items as $book)
					<tr class="rem{{$loop->index + 1}}">
						<td class="invert">{{$loop->index + 1}}</td>
						<td class="book_id" id="book_id" hidden>{{$book['item']['book_id']}}</td>
						<td class="invert-image"><a href="single.html"><img src="{{$book['item']['picture']}}" alt=" " class="img-fluid"></a>
						</td>
						<td class="invert">{{$book['item']['book_name']}}</td>
						<td class="invert">
							<div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>{{$book['qty']}}</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">5.000 đ</td>
						<td class="invert">{{number_format($book['price'], 0, ',', '.')}} đ</td>
						<td class="invert">
							<div class="rem">
								<div class="close{{$loop->index + 1}}"> </div>
							</div>
							<script>$(document).ready(function(c) {
								$('.close{{$loop->index + 1}}').on('click', function(c){
									$('.rem{{$loop->index + 1}}').fadeOut('slow', function(c){
										var id = document.getElementById('book_id').innerHTML;
										var id = $(this).parent().parent().parent().find("#book_id").text();
										console.log("id book remove : " + id);
										removeBook(id);
										$('.rem{{$loop->index + 1}}').remove();
									});
								});	  
							});	</script>
						</td>
					</tr>
					@endforeach
					@else
					<tr class="rem">
						Giỏ hàng trống
					</tr>

					@endif

					<!--quantity-->
					<script>
						$('.value-plus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
							divUpd.text(newVal);
							// var id = document.getElementById('book_id').innerHTML;
							var id = $(this).parent().parent().parent().parent().find('#book_id').text();
							console.log('id book: ' + id);
							increaseQty(id);
						});

						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
							if(newVal>=1){
								divUpd.text(newVal);
								// var id = document.getElementById('book_id').innerHTML;
								var id = $(this).parent().parent().parent().parent().find('#book_id').text();
								console.log('id book: ' + id);
								decreaseQty(id);
							}
						});
					</script>
					<!--quantity-->
				</tbody>
			</table>
		</div>
		<div class="checkout-left">	
			<div class="checkout-left-basket animated wow slideInLeft animated" data-wow-delay=".3" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<h4>Thông tin</h4>
				<ul>
					@if($cart)
					@foreach($items as $book)
					<li>{{$book['item']['book_name']}} <i>-</i> <span>{{number_format($book['price'], 0, '.', ',')}} đ </span></li>
					@endforeach
					<li>Total Service Charges <i>-</i> <span>{{number_format($cart->totalQty * 5000, 0, '.', ',')}} đ</span></li>
					<li>Total <i>-</i> <span>{{number_format($cart->totalPrice + $cart->totalQty * 5000, 0, '.', ',')}} đ</span></li>
					@else
					<tr class="rem1">
						Giỏ hàng trống
					</tr>

					@endif

					{{-- <li>Total Service Charges <i>-</i> <span>$15.00</span></li>
						<li>Total <i>-</i> <span>$854.00</span></li> --}}


					</ul>
				</div>
				<div class="checkout-right-basket animated wow slideInRight animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
					<a href="{{route('home')}}" class="btn btn-primary">Chọn thêm</a>
					<a href="{{route('removeAllCart')}}" class="btn btn-primary ">Xóa toàn bộ</a>
					<a href="{{route('cart')}}" class="btn btn-primary">Cập nhật</a>
					<a href="{{ route('getBuyBook') }}" class="btn btn-primary">Thanh toán</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	@endsection