@extends('layout.master')
@section('container')
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				@include('layout.elements.side_bar')
			</div>
			<div class="col-sm-9">
				@yield('content')
			</div>
		</div>
	</div>
@endsection

