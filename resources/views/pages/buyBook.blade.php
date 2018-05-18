@extends('layout.master')
@section('container')
<div class="container">
	<br>
	<div id="contentbuybook">
		
	</div>
</div>

<script >
	$(document).ready(function (){
		$("#contentbuybook").load("{{ route('getContentCheckOut') }}");
	});
</script>
@endsection 