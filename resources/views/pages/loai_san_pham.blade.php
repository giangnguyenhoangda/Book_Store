@extends('layout.frame')
@section('content')
<br>
<div class="features_items"><!--features_items-->
	<br>
	<div class="left-sidebar">
	<h2 class="title text-center">{{ $title }}</h2></div>
	@php
		$count=0
	@endphp
	@foreach ($listBook as $book)
			@if ($count%4==0)
				<div class="row">
			@endif
			<div class="col-sm-3">
			<div class="product-image-wrapper">
				<div class="single-products book_choose">
					<a href="{{ route('getBookDetail',['id'=>$book->book_id]) }}">
						<div class="productinfo text-center">
							<br>
							<img class="img-fluid" src="{{ asset($book->picture) }}" alt="" width="100" height="145">
							<h2>{{number_format($book->price, 0, ',', '.')}} đ</h2>
							<p>
								@php
									if (strlen($book->book_name)>27) {
										echo substr($book->book_name, 0,23).'...';
									}
									else{
										echo $book->book_name;
									}
								@endphp
							</p>
							<a href="{{ route('book.addToCart', ['id'=>$book->book_id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
						</div>
					</a>
				</div>
			</div>
			</div>
			@if ($count%4==3)
				</div>
			@endif
			@php
				$count++
			@endphp
	@endforeach


</div>
	<div >
		<div class="row text-center">
		
		{{ $listBook->links() }}
		</div>
	</div>
</div>
@endsection