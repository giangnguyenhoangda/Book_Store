
<div class="header">
	<div class="container">
		<div class="header-grid">
			<div class="header-grid-left animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<ul>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:nh.giang261197@gmail.com">nh.giang261197@gmail.com</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>01658215007</li>
					@if (!session('UserLogin'))
					<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="{{ route('getLogin') }}">Đăng nhập</a></li>
					<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="{{ route('register') }}">Đăng ký</a></li>
					@endif
				</ul>
			</div>
			<div class="header-grid-right animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
				<ul class="social-icons">
					<li><a href="#" class="facebook"></a></li>
					<li><a href="#" class="twitter"></a></li>
					<li><a href="#" class="g"></a></li>
					<li><a href="#" class="instagram"></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="logo-nav">
			<div class="logo-nav-left animated wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
				<h1><a href="{{ route('home') }}">Best Store <span class="fix">Mua sách ở mọi nơi</span></a></h1>
			</div>
				
				<div class="logo-nav-right">
					<div class="search-box">
						<div id="sb-search" class="sb-search sb-search-open">
							<div class="searchdiv">
								<form action="{{ route('postSearchBook_1') }}" method="post">
									<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
									<input class="sb-search-input" placeholder="Nhập sách cần tìm..." type="search" id="search_content" name="search_content">
									<select class="form-control" id="search_type" name="search_type">
										<option value="1">Tất cả</option>
										<option value="2">Sách</option>
										<option value="3">Tác giả</option>
										<option value="4">Thể loại</option>
										<option value="5">Nhà xuất bản</option>
									</select>
									<div id="result">
										
									</div>
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
					</div>
					<!-- search-scripts -->

					<script src="{{ asset('js/classie.js') }}"></script>
					<script src="{{ asset('js/uisearch.js') }}"></script>
					<script >
						$(document).ready(function (){ 
							$('#search_content').on('keyup',function (){
								
								if ($('#search_content').val()!='') {
									$.ajax({
										url:"{{ url('') }}"+'/'+'search',
										method: 'post',
										data:{
											_token: $('#token').val(),
											search_content: $('#search_content').val(),
											search_type:$('#search_type').val()
										},
										success: function(result){
											var str='';
											if(result.length>0){
												str+='<ul>';
												for(var i=0;i<result.length;i++){
													str+='<li><a class="giang" href="{{ url('') }}/book_detail/'+result[i]["book_id"]+'" />'+result[i]["book_name"]+'</li>';
												}
												str+='</ul>';
											}
											document.getElementById("result").innerHTML=str;
										}
									});
								}
								else{
									document.getElementById("result").innerHTML='';
								}
							});


							$('#search_type').on('change',function (){

								if ($('#search_content').val()!='') {
									$.ajax({
										url:"{{ url('') }}"+'/'+'search',
										method: 'post',
										data:{
											_token: $('#token').val(),
											search_content: $('#search_content').val(),
											search_type:$('#search_type').val()
										},
										success: function(result){
											var str='';
											if(result.length>0){
												str+='<ul>';
												for(var i=0;i<result.length;i++){
													str+='<li><a class="giang" href="{{ url('') }}/book_detail/'+result[i]["book_id"]+'" />'+result[i]["book_name"]+'</li>';
												}
												str+='</ul>';
											}
											document.getElementById("result").innerHTML=str;
										}
									});
								}
								else{
									document.getElementById("result").innerHTML='';
								}
							});
						});
					</script>
					
				</div>
				<div class="header-right">
					@if (session('UserLogin'))
					
					<ul class="nav navbar-top-links navbar-right">
						<!-- /.dropdown -->
						<li class="dropdown">
							<a class="dropdown-toggle usericon" data-toggle="dropdown" href="#">

								<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li class="text-center" style="font-size: 15px"><b>{{ session('UserLogin')->user_name }}</b>
								</li>
								<li><a href="{{route('user_information')}}"><i class="fa fa-user fa-fw"></i> Thông tin tài khoản</a>
								</li>
								<li class="divider"></li>
								<li><a href="{{ route('getLogout') }}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
								</li>
							</ul>
							<!-- /.dropdown-user -->
						</li>
						<!-- /.dropdown -->
					</ul>
					@endif
					<div class="cart box_1">
						<a href="{{ route('cart') }}">
							<h3> <div class="total">
								@if(Session::has('cart'))
								<span class="simpleCart_total">{{number_format(Session::get('cart')->totalPrice, 0, ',', '.')}} đ</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">{{ Session::get('cart')->totalQty }}</span> items)</div>
								@else
								<span class="simpleCart_total">0.00 đ</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> items)</div>
								@endif
								<img src="{{ asset('images/bag.png') }}" alt="">
							</h3>
						</a>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div class="clearfix"> </div>
			</div>
			<hr>
		</div>
	</div>
</div>