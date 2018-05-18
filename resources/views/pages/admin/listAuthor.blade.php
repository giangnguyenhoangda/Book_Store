@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Danh Sách Tác Giả
        </header>
        <div class="panel-body">
          <div class="clearfix">
            <div class="btn-group">
              <button id="editable-sample_new" class="btn green">
                <a href="{{ route('getAddAuthor') }}">
                  Thêm Tác Giả <i class="fa fa-plus"></i>
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
              <th style="width: 5%"><i class="fa fa-bullhorn"></i> ID</th>
              <th style="width: 10%">Ảnh</th>
              <th class="hidden-phone"><i class="fa fa-question-circle"></i> Tên Tác Giả</th>
              <th>Giới Thiệu</th>
              <th style="width: 10%"></th>
            </tr>
          </thead>
          <tbody>
           @foreach ($listAuthor as $author)
           <tr>
             <td><a href="#">{{ $author->author_id }}</a></td>
             <td>@if ($author->author_image!='')
              <img src="{{ asset($author->author_image) }}" alt="" class="img-fluid" width="60">
            @endif</td>
            <td class="hidden-phone">{{ $author->name }}</td>
            <td>{{ $author->author_describe }}</td>
            <td>
             <button class="btn btn-primary btn-xs"><a class="agiang" href="{{ route('getEditAuthor',$author->author_id) }}"><i class="fa fa-pencil"></i></a></button>
             <button class="btn btn-danger btn-xs"><a class="agiang" href="{{ route('getRemoveAuthor',$author->author_id) }}"><i class="fa fa-trash-o "></i></a></button>
           </td>
         </tr>
         @endforeach
       </tbody>
     </table>
     <div class="text-center">
       {{ $listAuthor->links() }}
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
          url:"{{ route('getExportListAuthor') }}",
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