@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Danh Sách Đơn Hàng
        </header>
        <div class="panel-body">
          <div class="clearfix">
            <div class="btn-group pull-right">
              <button class="btn dropdown-toggle" data-toggle="dropdown">Công cụ <i class="fa fa-angle-down"></i>
              </button>
              <ul class="dropdown-menu pull-right">
                <li><a href="#">In</a></li>
                <li><a href="#">Lưu ra pdf</a></li>
                <li><a <a id="export_excel" style="cursor: pointer;">Lưu ra Excel</a></li>
              </ul>
            </div>
          </div>
        </div>
        @if (count($errors)>0)
        @foreach ($errors->all() as $element)
        <div class="alert alert-danger">
          {{ $element }}
        </div>
        <br>
        @endforeach
        @endif
        @if (session('thongbao'))
        <div class="alert alert-success">
          {{ session('thongbao') }}
        </div>
        @endif
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th><i class="fa fa-bullhorn"></i> ID</th>
              <th>User Name</th>
              <th>Tên Người Đặt</th>
              <th class="hidden-phone"><i class="fa fa-question-circle"></i> Người Nhận</th>
              <th>Địa Chỉ</th>
              <th><i class=" fa fa-edit"></i>Trạng Thái</th>
              <th>Thời Gian Đặt</th>
              <th>Thời Gian Nhận</th>
              <th style="width: 10%"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list as $order)
            <tr>
              <td><a href="#">{{ $order->order_id }}</a></td>
              <td class="hidden-phone">{{ $order->user_name }}</td>
              <td>{{ $order->first_name.' '.$order->last_name }}</td>
              <td>{{ $order->receiver_name }}</td>
              <td>{{ $order->address }}</td>
              @if ($order->status==-1)
              <td><span class="label label-danger label-mini">Từ Chối</span></td>
              @elseif ($order->status==0)
              <td><span class="label label-warning label-mini">Đang Duyệt</span></td>
              @elseif ($order->status==1)
              <td><span class="label label-success label-mini">Chấp Nhận</span></td>
              @endif
              <td>{{ $order->date_created }}</td>
              <td>{{ $order->date_received }}</td>
              <td>
               <button class="btn btn-primary btn-xs"><a class="agiang" href="{{ route('getEditOrderDetail',$order->order_id) }}"><i class="fa fa-info-circle"></i></a></button>
               <button class="btn btn-danger btn-xs"><a class="agiang" href="{{ route('getDeleteOrder',$order->order_id) }}"><i class="fa fa-trash-o "></i></a></button>
             </td>
           </tr>
           @endforeach
         </tbody>
       </table>
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
          url:"{{ route('getExportListOrderDetail') }}",
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