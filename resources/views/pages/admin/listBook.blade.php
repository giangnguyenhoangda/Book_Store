@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Danh Sách Sách
        </header>
        <div class="panel-body">
          <div class="clearfix">
            <div class="btn-group">
              <button id="editable-sample_new" class="btn green">
                <a href="{{ route('getAddBook') }}">
                  Thêm Sách <i class="fa fa-plus"></i>
                </a>
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
              <th>Ảnh Bìa</th>
              <th class="hidden-phone" style="width: 19%"><i class="fa fa-question-circle" ></i> Tên Sách</th>
              <th>Tác Giả</th>
              <th style="width: 10%">Thể Loại</th>
              <th style="width: 10%">Ngôn Ngữ</th>
              <th style="width: 11%">Năm Xuất Bản</th>
              <th style="width: 10%">Nhà Xuất Bản</th>
              <th >Giá</th>
              <th style="width: 8%">Số Lượng</th>
              <th style="width: 7%"></th>
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
            <td>{{ $book->getAuthor->name }}</td>
            <td>{{ $book->getCategory->category_name }}</td>
            <td>{{ $book->language }}</td>
            <td>{{ $book->publish_year }}</td>
            <td>{{ $book->publisher }}</td>
            <td>{{number_format($book->price, 0, ',', '.')}} đ</td>
            <td>{{ $book->quantity }}</td>
            <td>
             <button class="btn btn-primary btn-xs"><a class="agiang" href="{{ route('getEditBook',$book->book_id) }}"><i class="fa fa-pencil"></i></a></button>
             <button class="btn btn-danger btn-xs"><a class="agiang" href="{{ route('getRemoveBook',$book->book_id) }}"><i class="fa fa-trash-o "></i></a></button>
           </td>
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
          url:"{{ route('getExportListBook') }}",
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