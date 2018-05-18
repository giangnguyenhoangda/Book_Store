@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Bảng Xếp Hạng Sách Bán Chạy
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
              <th>Ảnh Bìa</th>
              <th class="hidden-phone" style="width: 19%"><i class="fa fa-question-circle" ></i> Tên Sách</th>
              <th>Tác Giả</th>
              <th style="width: 10%">Thể Loại</th>
              <th style="width: 10%">Ngôn Ngữ</th>
              <th style="width: 14%">Năm Xuất Bản</th>
              <th style="width: 10%">Nhà Xuất Bản</th>
              <th style="width: 10%">Số Lượng Bán</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($listBook as $book)
           <tr>
             <td><a href="#">{{ $book->book_id }}</a></td>
             <td>@if ($book->picture!=null)
              <img src="{{ asset($book->picture) }}" class="img-fluid" width="60">
            @endif</td>
            <td class="hidden-phone">{{ $book->book_name }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->category_name }}</td>
            <td>{{ $book->language }}</td>
            <td>{{ $book->publish_year }}</td>
            <td>{{ $book->publisher }}</td>
            <td>{{ $book->quantitysell }}</td>
         </tr>
         @endforeach
       </tbody>
     </table>
     <div class="text-center">
       {{ $listBook->links() }}
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
          url:"{{ route('getThongKeSachBanChay') }}",
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