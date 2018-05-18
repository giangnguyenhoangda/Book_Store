<div class="left-sidebar">
	<br>
	<br>
	<h2>Danh mục</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
						<span class="badge pull-right"><i class="fa fa-plus"></i></span>
						Thể loại
					</a>
				</h4>
			</div>
			<div id="sportswear" class="panel-collapse collapse">
				<div class="panel-body">
					<ul>
						@if (count($listCategory)>0)
						@foreach ($listCategory as $category)
						<li><a class="ahover" href="{{ route('loaisanpham',$category->category_id) }}">{{ $category->category_name }} </a></li>
						@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordian" href="#mens">
						<span class="badge pull-right"><i class="fa fa-plus"></i></span>
						Tác giả
					</a>
				</h4>
			</div>
			<div id="mens" class="panel-collapse collapse">
				<div class="panel-body">
					<ul>
						@if (count($listAuthor)>0)
						@foreach ($listAuthor as $author)
						<li><a class="ahover" href="{{ route('getBookByAuthor',$author->author_id) }}">{{ $author->name }}</a></li>
						@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="{{ route('getComingSoon') }}">Sách mới</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="{{ route('getSachBanChay') }}">Sách bán chạy</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="{{ route('getSachXemNhieu') }}">Sách xem nhiều</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="{{ route('getSachDanhGiaCao') }}">Sách được yêu thích</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="{{ route('getComingSoon') }}">Sách giảm giá</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="{{ route('getComingSoon') }}">Sách sắp phát hành</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="{{ route('getComingSoon') }}">Tiểu thuyết - Truyện tranh</a></h4>
			</div>
		</div>
	</div><!--/category-products-->

	<div class="brands_products"><!--brands_products-->
		<h2>Số lượng</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
				@if (count($listCategoryAndQuantity)>0)
				@foreach ($listCategoryAndQuantity as $element)
				<li><a href="{{ route('loaisanpham',$element->category_id) }}"> <span class="pull-right">({{ $element->Sum }})</span>{{ $element->category_name }}</a></li>
				@endforeach
				@endif
			</ul>
		</div>
	</div><!--/brands_products-->
</div>