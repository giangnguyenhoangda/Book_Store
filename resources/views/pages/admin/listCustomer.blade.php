@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Danh Sách Khách Hàng
        </header>
        <div class="panel-body">
          <div class="clearfix">
            <div class="btn-group">
              <button id="editable-sample_new" class="btn green">
                <a href="{{ route('getAddCustomer') }}">Thêm Khách Hàng <i class="fa fa-plus"></i></a>
              </button>
            </div>
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
              <th></i>User_name</th>
              <th>Password</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Address</th>
              <th>City</th>
              <th style="width: 10%"></th>
            </tr>
          </thead>
          <tbody>
           @foreach ($list as $customer)
           <tr>
             <td><a href="#">{{ $customer->user_id }}</a></td>
             <td>{{ $customer->user_name }}</td>
             <td>{{ $customer->password }}</td>
             <td>{{ $customer->first_name }}</td>
             <td>{{ $customer->last_name }}</td>
             <td>{{ $customer->address }}</td>
             <td>{{ $customer->city }}</td>
             <td>
               <button class="btn btn-primary btn-xs"><a class="agiang" href="{{ route('getEditCustomer',$customer->user_id) }}"><i class="fa fa-pencil"></i></a></button>
               <button class="btn btn-danger btn-xs"><a class="agiang" href="{{ route('getRemoveCustomer',$customer->user_id) }}"><i class="fa fa-trash-o "></i></a></button>
             </td>
           </tr>
           @endforeach
         </tbody>
       </table>
       <div class="text-center">
         {{ $list->links() }}
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
          url:"{{ route('getExportListCustomer') }}",
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