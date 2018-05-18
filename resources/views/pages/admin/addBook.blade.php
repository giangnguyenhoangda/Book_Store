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
              Thêm Sách
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
              <form role="form" action="{{ route('postAddBook') }}" method="POST" enctype="multipart/form-data">
                <div class="col-sm-4">
                  <div class="form-group last">
                    <label class="control-label" style="text-align: right;margin-left: 23%;">Ảnh Bìa</label>
                    <div >
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="" id="imga" alt="">
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                         <span class="btn btn-white btn-file">
                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
                           <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                           <input type="file"  name="picture" class="default">
                         </span>
                         <a href="#" id="delete-image" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Xóa</a>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-sm-8">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên Sách</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input class="form-control" name="book_name" id="exampleInputEmail1" placeholder="Vui lòng nhập tên sách">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tác Giả</label>
                  <select class="form-control m-bot15" name="author">
                    @foreach ($listAuthor as $author)
                    <option value="{{ $author->author_id }}">{{ $author->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Thể Loại</label>
                  <select class="form-control m-bot15" name="category">
                    @foreach ($listCategory as $category)
                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nhà Xuất Bản</label>
                  <input class="form-control" name="publisher" id="exampleInputEmail1" placeholder="Vui lòng nhập nhà xuất bản">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Giá Sách</label>
                  <input type="number" name="price" value="0" class="spinner-input form-control" min="0">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">ISBN</label>
                  <input class="form-control" name="ISBN" id="exampleInputEmail1" placeholder="Vui lòng nhập ISBN">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ngôn Ngữ</label>
                  <input class="form-control" name="language" id="exampleInputEmail1" placeholder="Vui lòng nhập ngôn ngữ">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Năm Xuất Bản</label>
                  <input type="number" name="publish_year" class="spinner-input form-control" min="0">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Số Lượng</label>
                  <input type="number" name="quantity" class="spinner-input form-control" min="0">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Đánh Giá</label>
                  <input class="form-control" name="rating" id="exampleInputEmail1" placeholder="Đánh giá sách">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mô Tả Sách</label>
                  <textarea class="form-control" rows="3" name="abstract" id="exampleInputEmail1" placeholder="Giới thiệu qua về sách"></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">Thêm Sách</button>
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