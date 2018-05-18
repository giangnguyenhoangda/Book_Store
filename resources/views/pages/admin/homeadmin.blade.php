@extends('pages.admin.frame')
@section('content')
@php
	$arrThu=array(
		'Monday'=>'Thứ 2',
		'Tuesday'=>'Thứ 3',
		'Wednesday'=>'Thứ 4',
		'Thursday'=>'Thứ 5',
		'Friday'=>'Thứ 6',
		'Saturday'=>'Thứ 7',
		'Sunday'=>'Chủ Nhật'
	);
	$arrThang=array(
		'Jan'=>'Tháng Một',
		'Feb'=>'Tháng Hai',
		'Mar'=>'Tháng Ba',
		'Apr'=>'Tháng Tư',
		'May'=>'Tháng Năm',
		'Jun'=>'Tháng Sáu',
		'Jul'=>'Tháng Bảy',
		'Aug'=>'Tháng Tám',
		'Sep'=>'Tháng Chín',
		'Oct'=>'Tháng Mười',
		'Nov'=>'Tháng Mười Một',
		'Dec'=>'Tháng Mười Hai'
	);
@endphp
<section class="wrapper">
	<!--state overview start-->
	<div class="row state-overview">
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol terques">
					<i class="fa fa-user"></i>
				</div>
				<div class="value">
					<h1 class="count">
						{{ $countCustomer }}
					</h1>
					<p>Khách Hàng</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol red">
					<i class="fa fa-book"></i>
				</div>
				<div class="value">
					<h1 class=" count2">
						{{ $countBook }}
					</h1>
					<p>Sách</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol blue">
					<i class="fa fa-indent"></i>
				</div>
				<div class="value">
					<h1 class=" count4">
						{{ $countCategory }}
					</h1>
					<p>Thể Loại</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol yellow">
					<i class="fa fa-shopping-cart"></i>
				</div>
				<div class="value">
					<h1 class=" count3">
						@foreach ($countOrder as $element)
						{{ $element->count }}
						@endforeach
					</h1>
					<p>Đơn Hàng</p>
				</div>
			</section>
		</div>
	</div>
	<!--state overview end-->
	<div class="row">
		<div class="col-lg-8">
			<!--custom chart start-->
			<div class="border-head">
				<h3>Doanh Thu Tuần {{ $numberw }}</h3>
			</div>
			<div class="custom-bar-chart">
				<ul class="y-axis">
					<li><span>100</span></li>
					<li><span>80</span></li>
					<li><span>60</span></li>
					<li><span>40</span></li>
					<li><span>20</span></li>
					<li><span>0</span></li>
				</ul>
				@foreach ($t as $key=>$value)
				<div class="bar">
					<div class="title">{{ $arrThu[$key] }}</div>
					<div class="value tooltips" data-original-title="{{ $value }}%" data-toggle="tooltip" data-placement="top">{{ $value }}%</div>
				</div>
				@endforeach
			</div>
			<!--custom chart end-->
		</div>
		<div class="col-lg-4">
			<!--new earning start-->
			<div class="panel terques-chart">
				<div class="panel-body chart-texture">
					<div class="chart">
						<div class="heading">
							@foreach ($dayTotal as $element)
							<span>{{ $arrThu[$element->Name] }}</span>
							<strong>@if ($element->total_money!='')
								{{number_format($element->total_money, 0, ',', '.')}}
							@else
								0
							@endif đ | {{ $t[$element->Name] }}%</strong>
							@endforeach
						</div>
						<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
					</div>
				</div>
				<div class="chart-tittle">
					<span class="title">Thu Nhập</span>
					<span class="value">
						<a href="#" class="active">Cửa Hàng</a>
						|
						<a href="#">Online</a>
					</span>
				</div>
			</div>
			<!--new earning end-->

			<!--total earning start-->
			<div class="panel green-chart">
				<div class="panel-body">
					<div class="chart">
						<div class="heading">
							@foreach ($monthTotal as $element)
							<span>{{ $arrThang[$element->Name] }}</span>
							<strong>{{ $element->dayofmonth }} Ngày | {{ $element->percent }}%</strong>
							@endforeach
						</div>
						<div id="barchart"></div>
					</div>
				</div>
				<div class="chart-tittle">
					<span class="title">Tổng Doanh Thu</span>
					@foreach ($monthTotal as $element)
					<span class="value">{{number_format($element->total_money, 0, ',', '.')}} đ</span>
					@endforeach
				</div>
			</div>
			<!--total earning end-->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!--timeline start-->
			<section class="panel">
				<div class="panel-body">
					<div class="text-center mbot30">
						<h3 class="timeline-title">Timeline</h3>
						<p class="t-info">10 Đơn đặt hàng gần đây</p>
					</div>

					<div class="timeline">
						@for ($i = 0; $i <count($_10order) ; $i++)
						@if ($i%2==0)
						<article class="timeline-item">
							<div class="timeline-desk">
								<div class="panel">
									<div class="panel-body">
										<span class="arrow"></span>
										<span class="timeline-icon red"></span>
										<span class="timeline-date">{{ date('H:m',strtotime($_10order[$i]->date_created)) }}</span>
										<h1 class="red">{{ date('d ',strtotime($_10order[$i]->date_created)).$arrThang[date('M',strtotime($_10order[$i]->date_created))].' | '.$arrThu[date('l',strtotime($_10order[$i]->date_created))] }}</h1>
										<p><a class="bgiang" href="{{ route('getEditOrderDetail',$_10order[$i]->order_id) }}">{{ $_10order[$i]->first_name.' '.$_10order[$i]->last_name.' ' }}</a> đã đặt mua một đơn hàng</p>
									</div>
								</div>
							</div>
						</article>
						@else
						<article class="timeline-item alt">
							<div class="timeline-desk">
								<div class="panel">
									<div class="panel-body">
										<span class="arrow-alt"></span>
										<span class="timeline-icon green"></span>
										<span class="timeline-date">{{ date('h:m',strtotime($_10order[$i]->date_created)) }}</span>
										<h1 class="green">{{ date('d ',strtotime($_10order[$i]->date_created)).$arrThang[date('M',strtotime($_10order[$i]->date_created))].' | '.$arrThu[date('l',strtotime($_10order[$i]->date_created))] }}</h1>
										<p><a href="{{ route('getEditOrderDetail',$_10order[$i]->order_id) }}">{{ $_10order[$i]->first_name.' '.$_10order[$i]->last_name.' ' }}</a>đã đặt mua một đơn hàng <span><a href="#" class="green"></a></span></p>
									</div>
								</div>
							</div>
						</article>
						@endif
						@endfor
					</div>

					<div class="clearfix">&nbsp;</div>
				</div>
			</section>
			<!--timeline end-->
		</div>
	</div>
</section>
@endsection