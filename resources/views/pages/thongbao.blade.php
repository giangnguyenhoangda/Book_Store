@extends('layout.master')
@section('container')
	<div >
		<br>
		@if (session('nhac_nho'))
			<p class="text-danger text-center">{{ session('nhac_nho') }}</p>
		@endif
		@if (session('dat_hang_thanh_cong'))
			<p class="text-success text-center">{{ session('dat_hang_thanh_cong') }}</p>
		@endif		
	</div>
@endsection