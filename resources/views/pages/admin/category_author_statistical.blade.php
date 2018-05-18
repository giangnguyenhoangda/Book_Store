@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
	<!-- page start-->
	<div class="row">
		<div class="col-lg-6">
			<section class="panel">
				<header class="panel-heading">
					Thể Loại
				</header>
				<div class="panel-body">
					<div class="clearfix">
						<div class="btn-group pull-right">
							<button class="btn dropdown-toggle" data-toggle="dropdown">Công cụ <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">In</a></li>
								<li><a href="#">Lưu ra pdf</a></li>
								<li><a href="#">Lưu ra Excel</a></li>
							</ul>
						</div>
					</div>
				</div>
				<table class="table table-striped table-advance table-hover">
					<thead>
						<tr>
							<th style="width: 15%"><i class="fa fa-bullhorn"></i> ID</th>
							<th class="hidden-phone"><i class="fa fa-question-circle"></i>Thể Loại</th>
							<th style="width: 25%">Số Lượng (Sách)</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($list as $item)
						<tr>
							<td>{{ $item->category_id }}</td>
							<td class="hidden-phone">{{ $item->category_name }}</td>
							<td>
								{{ $item->quantity }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{{ $list->links() }}
				</div>
			</section>

			<section class="panel">
				<header class="panel-heading">
					Ngôn Ngữ
				</header>
				<div class="panel-body">
					<div class="clearfix">
						<div class="btn-group pull-right">
							<button class="btn dropdown-toggle" data-toggle="dropdown">Công cụ <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">In</a></li>
								<li><a href="#">Lưu ra pdf</a></li>
								<li><a href="#">Lưu ra Excel</a></li>
							</ul>
						</div>
					</div>
				</div>
				<table class="table table-striped table-advance table-hover">
					<thead>
						<tr>
							<th class="hidden-phone"><i class="fa fa-question-circle"></i>Ngôn Ngữ</th>
							<th style="width: 25%">Số Lượng (Sách)</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($list3 as $item)
						<tr>
							<td class="hidden-phone">{{ $item->language }}</td>
							<td>
								{{ $item->quantity }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{{ $list3->links() }}
				</div>
			</section>
			<section class="panel">
				<header class="panel-heading">
					Nhà Xuất Bản
				</header>
				<div class="panel-body">
					<div class="clearfix">
						<div class="btn-group pull-right">
							<button class="btn dropdown-toggle" data-toggle="dropdown">Công cụ <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">In</a></li>
								<li><a href="#">Lưu ra pdf</a></li>
								<li><a href="#">Lưu ra Excel</a></li>
							</ul>
						</div>
					</div>
				</div>
				<table class="table table-striped table-advance table-hover">
					<thead>
						<tr>
							<th class="hidden-phone"><i class="fa fa-question-circle"></i>Nhà Xuất Bản</th>
							<th style="width: 25%">Số Lượng (Sách)</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($list4 as $item)
						<tr>
							<td class="hidden-phone">{{ $item->publisher }}</td>
							<td>
								{{ $item->quantity }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{{ $list3->links() }}
				</div>
			</section>
		</div>
		<div class="col-sm-6">
			<section class="panel">
				<header class="panel-heading">
					Tác Giả
				</header>
				<div class="panel-body">
					<div class="clearfix">
						<div class="btn-group pull-right">
							<button class="btn dropdown-toggle" data-toggle="dropdown">Công cụ <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">In</a></li>
								<li><a href="#">Lưu ra pdf</a></li>
								<li><a href="#">Lưu ra Excel</a></li>
							</ul>
						</div>
					</div>
				</div>
				<table class="table table-striped table-advance table-hover">
					<thead>
						<tr>
							<th style="width: 15%"><i class="fa fa-bullhorn"></i> ID</th>
							<th class="hidden-phone"><i class="fa fa-question-circle"></i>Tác Giả</th>
							<th style="width: 25%">Số Lượng (Sách)</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($list2 as $item)
						<tr>
							<td>{{ $item->author_id }}</td>
							<td class="hidden-phone">{{ $item->name }}</td>
							<td>
								{{ $item->quantity }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{{ $list2->links() }}
				</div>
			</section>
		</div>
	</div>
	<!-- page end-->
</section>
@endsection