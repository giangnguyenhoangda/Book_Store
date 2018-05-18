@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <div>
          <section class="panel">
            <header class="panel-heading">
              Thêm Tác Giả
            </header>
            <div class="panel-body">
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
              <form role="form" action="{{ route('postAddAuthor') }}" method="POST" enctype="multipart/form-data">
                <div class="col-sm-4">
                  <div class="form-group last">
                    <label class="control-label col-md-1">Ảnh</label>
                    <div class="col-md-11">
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="" alt="">
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                         <span class="btn btn-white btn-file">
                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
                           <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                           <input type="file" name="author_picture" class="default">
                         </span>
                         <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Xóa</a>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-sm-8">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên Tác Giả</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input class="form-control" name="author_name" id="exampleInputEmail1" placeholder="Vui lòng nhập tên tác giả">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Giới Thiệu</label>
                  <textarea class="form-control" rows="6" name="author_describe" id="exampleInputEmail1" placeholder="Giới thiệu qua về tác giả"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Thêm Tác Giả</button>
                <button type="reset" class="btn btn-danger">Nhập Lại</button>
              </div>
            </form>
          </div>
        </section>
      </div>
    </section>
  </div>
</div>
<!-- page end-->
</section>
@endsection