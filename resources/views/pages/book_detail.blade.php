@extends('layout.master')
@section('container')
<div class="container">
	<div class="col-md-12">
		@foreach ($books as $book)
		<div class="col-md-5 grid">		
			<div class="flexslider">
				<ul class="slides">
					<li data-thumb="{{ asset($book->picture) }}">
						<div class="thumb-image"> 
							<img src="{{ asset(asset($book->picture)) }}" data-imagezoom="true" class="img-fluid" width="100">
						</div>
					</li>
				</ul>
			</div>
		</div>	
		<div class="col-md-7 single-top-in">
			<div class="span_2_of_a1 simpleCart_shelfItem">
				<h3 id="book_name" book_id="{{ $book->book_id }}">{{ $book->book_name }}</h3>
				<div class="price_single">
					<span class="reducedfrom item_price">{{number_format($book->price, 0, ',', '.')}} đ</span>
					<a href="#">click for offer</a>
					<div class="clearfix">
					</div>
				</div>
				<h4 class="quick">Quick Overview:</h4>
				<p class="quick_desc"> {{ $book->abstract }}</p>
				<div class="quantity"> 
					<div class="quantity-select">                           
						<div class="entry value-minus">&nbsp;</div>
						<div class="entry value"><span>1</span></div>
						<div class="entry value-plus active">&nbsp;</div>
					</div>

					<!--quantity-->
					<script>
						$('.value-plus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
							divUpd.text(newVal);
						});

						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
							if(newVal>=1) divUpd.text(newVal);
						});
					</script>
					<a href="{{ route('book.addToCart', ['id'=>$book->book_id])}}
						" class="add-to item_add hvr-skew-backward">Thêm vào giỏ</a>
					<div class="clearfix"></div>

				</div>
				<!--quantity-->
				<script>
					$('.value-plus').on('click', function(){
						var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
						divUpd.text(newVal);
					});

					$('.value-minus').on('click', function(){
						var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
						if(newVal>=1) divUpd.text(newVal);
					});
				</script>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="tab-head">
			<nav class="nav-sidebar">
				<ul class="nav tabs">
					<li class="active"><a href="#tab1" data-toggle="tab">THÔNG TIN CHI TIẾT</a></li>

					<li class=""><a href="#tab3" data-toggle="tab">KHÁCH HÀNG NHẬN XÉT</a></li>  
				</ul>
			</nav>
			<div class="tab-content one">
				<div class="tab-pane active text-style" id="tab1">
					<div class="facts">
						<table class="table table-bordered">
							<tr>
								<th>Nhà xuất bản</th>
								<td>{{$book -> publisher}}</td>
							</tr>
							<tr>
								<th>Tác giả</th>
								<td>{{$book -> name}}</td>
							</tr>
							<tr>
								<th>Ngôn ngữ</th>
								<td>{{$book -> language}}</td>
							</tr>
							<tr>
								<th>Năm xuất bản</th>
								<td>{{$book -> publish_year}}</td>
							</tr>
							<tr>
								<th>ISBN</th>
								<td>{{$book -> ISBN}}</td>
							</tr>
						</table>
					</div>
				</div> 
				<div class="tab-pane text-style" id="tab3">
					<div class="facts">
						<div class="row">
							<div class="col-sm-3">
								<div id="danhgia">
									<p>Đánh giá trung bình</p>
									@foreach ($review_info1 as $element)
									<h1>@if ($element->medium==null)
										0/5
									@else
										{{ $element->medium }}/5
									@endif
									</h1>
									<p><span>({{ $element->quantity }}) nhận xét</span></p>
									@endforeach
								</div>
							</div>
							<div class="col-sm-6" id="str1">
								<div id="1-star">
									<div class="col-sm-2">
										<span>1 </span><span class="fa fa-star checked" style="color: orange;"></span>
									</div>
									<div class="col-sm-10">
										<div class="progress">
											@if (count($review_info2)>0&&array_key_exists(1,$review_info2))
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:{{ $review_info2[1] }}%">
												{{ $review_info2[1] }}%
												</div>
											@else
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:0%">
												0%
												</div>
											@endif
										</div>
									</div>
								</div>
								<div id="2-star">
									<div class="col-sm-2">
										<span>2 </span><span class="fa fa-star" style="color: orange;"></span>
									</div>
									<div class="col-sm-10">
										<div class="progress">
											@if (count($review_info2)>0&&array_key_exists(2,$review_info2))
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:{{ $review_info2[2] }}%">
												{{ $review_info2[2] }}%
												</div>
											@else
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:0%">
												0%
												</div>
											@endif
										</div>
									</div>
								</div>
								<div id="3-star">
									<div class="col-sm-2">
										<span>3 </span><span class="fa fa-star" style="color: orange;"></span>
									</div>
									<div class="col-sm-10">
										<div class="progress">
											@if (count($review_info2)>0&&array_key_exists(3,$review_info2))
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:{{ $review_info2[3] }}%">
												{{ $review_info2[3] }}%
												</div>
											@else
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:0%">
												0%
												</div>
											@endif
										</div>
									</div>
								</div>
								<div id="4-star">
									<div class="col-sm-2">
										<span>4 </span><span class="fa fa-star" style="color: orange;"></span>
									</div>
									<div class="col-sm-10">
										<div class="progress">
											@if (count($review_info2)>0&&array_key_exists(4,$review_info2))
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:{{ $review_info2[4] }}%">
												{{ $review_info2[4] }}%
												</div>
											@else
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:0%">
												0%
												</div>
											@endif
										</div>
									</div>
								</div>
								<div id="5-star">
									<div class="col-sm-2">
										<span>5 </span><span class="fa fa-star" style="color: orange;"></span>
									</div>
									<div class="col-sm-10">
										<div class="progress">
											@if (count($review_info2)>0&&array_key_exists(5,$review_info2))
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:{{ $review_info2[5] }}%">
												{{ $review_info2[5] }}%
												</div>
											@else
												<div class="progress-bar progress-bar-success" 
												role="progressbar" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100" style="width:0%">
												0%
												</div>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<p>Chia sẻ nhận xét về sản phẩm</p>
								<button type="button" class="btn btn-primary "
								data-toggle="collapse" data-target="#comment">Viết nhận xét của bạn</button>
							</div>
						</div>
					</div>

					<div class="panel panel-default" style="margin-top: 0px;">
						<div  class="panel-body">
							<div id="review_content">
								<table id="book_reviews" class="table table-bordered">
									@foreach($reviews as $review)
									<tr>
										<td class="col-sm-2">
											<span>{{ $review -> first_name }}</span>
											<span> {{ $review -> last_name }}</span>
											<br>
											<span>{{ $review -> review_date}}</span>
										</td>
										<td class="col-sm-10">
											<?php 
											for($i=0; $i < $review->rating; $i++)
												echo('<span class="fa fa-star" style="color: orange;"></span>');
											for($j=5; $j > $review->rating; $j--)
												echo('<span class="fa fa-star"></span>');
											?>
											<br>
											{{ $review ->reviews }}
										</td>
									</tr>
									@endforeach
								</table>
							</div>
							<div id="comment" class="collapse">
								<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
								<div class="col-sm-1">
								<input class="form-control" type="text" name="rating" id="rating" placeholder="/5">
								</div>
								<div class="col-sm-9">
								<textarea class="form-control" type="text" rows="5" name="review" id="review" placeholder="Hay..."></textarea>
								</div>
								<div class="col-sm-2">
								<button type="button" id="send_review" class="btn btn-primary" style="width:75%">Gửi</button>
								<button type="reset" class="btn btn-primary">Nhập lại</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="clearfix"></div>
</div>
<script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />
<script>
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>

<script >
	$(document).ready(function (){
		$('#send_review').on('click',function (){

			@if (session('UserLogin'))
			$.ajax({
				url: '{{ url('') }}'+'/'+'send_review',
				method: 'post',
				data: {
					_token: $('#token').val(),
					review: $('#review').val(),
					rating: $('#rating').val(),
					customer_id: {{ session('UserLogin')->user_id }},
					book_id: $('#book_name').attr('book_id')
				},
				success: function (result){
					document.getElementById('review_content').innerHTML=result['str'];
					document.getElementById('str1').innerHTML=result['str1'];
					document.getElementById('danhgia').innerHTML=result['str3'];
				}
			});
			@else
			alert('Chưa đăng nhập bạn trai xinh gái đẹp ơi');
			@endif
			
		});
	});
</script>
@endsection