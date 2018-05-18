@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Thống Kê Khách Hàng
        </header>
        <div class="panel-body">
          <div class="clearfix">
            <div class="btn-group pull-right">
              <button class="btn dropdown-toggle" data-toggle="dropdown">Công cụ <i class="fa fa-angle-down"></i>
              </button>
              <ul class="dropdown-menu pull-right">
                <li><a href="#">In</a></li>
                <li><a href="#">Lưu ra pdf</a></li>
                <li><a id="export_excel" style="cursor: pointer;">Lưu ra Excel</a></li>
              </ul>
            </div>
          </div>
        </div>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th><i class="fa fa-bullhorn"></i> ID</th>
              <th>User Name</th>
              <th>Số Đơn Hàng</th>
              <th>Số Sách</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($list as $item)
           <tr>
            <td>{{ $item->user_id }}</td>
            <td>{{ $item->user_name }}</td>
            <td>{{ $item->orderquantity }}</td>
            <td>{{ $item->bookquantity }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">
      </div>
    </section>
  </div>
</div>
<!-- page end-->
</section>
<script type="text/javascript">
  $(document).ready(function (){
    $('#export_excel').on('click',function (){
      if(confirm("Bạn có muốn xuất ra file excel")){
        $.ajax({
          url:"{{ route('getExportThongKeMuaHangCuaKhachHang') }}",
          method:'get',
          success: function(result){
            alert('Xuất ra file excel thành công. Xem trong public/export của server.');
          }
        });
      }
    });
  });

</script>
@endsection