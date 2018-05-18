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
              Sửa Sách
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
              <form role="form" action="{{ route('postEditBook') }}" method="POST" enctype="multipart/form-data">
                <div class="col-sm-4">
                  <div class="form-group last">
                    <label class="control-label" style="text-align: right;margin-left: 23%;">Ảnh Bìa</label>
                    <div >
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                          @if ($book->picture=="")
                          <img src="" alt="">
                          @else
                          <img src="{{ asset($book->picture) }}">
                          @endif
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                         <span class="btn btn-white btn-file">
                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
                           <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                           <input type="file" name="picture" class="default">
                         </span>
                         <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Xóa</a>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-sm-8">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên Sách</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="book_id" value="{{ $book->book_id }}" >
                  <input class="form-control" name="book_name" value="{{ $book->book_name }}" id="exampleInputEmail1" placeholder="Vui lòng nhập tên sách">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tác Giả</label>
                  <select class="form-control m-bot15" name="author">
                    @foreach ($listAuthor as $author)
                    <option value="{{ $author->author_id }}" @if ($author->author_id==$book->author_id)
                      selected="selected" 
                      @endif>{{ $author->name }}</option>
                      @endforeach
                      </select
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Thể Loại</label>
                    <select class="form-control m-bot15" name="category">
                      @foreach ($listCategory as $category)
                      <option value="{{ $category->category_id }}"
                        @if ($category->category_id==$book->category_id)
                        selected="selected" 
                        @endif
                        >{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nhà Xuất Bản</label>
                    <input class="form-control" name="publisher" value="{{ $book->publisher }}" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá Sách</label>
                    <input type="number" name="price" value="{{ $book->price }}" class="spinner-input form-control" min="0">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ISBN</label>
                    <input class="form-control" value="{{ $book->ISBN }}" name="ISBN">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngôn Ngữ</label>
                    <input class="form-control" value="{{ $book->language }}" name="language" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Năm Xuất Bản</label>
                    <input type="number" value="{{ $book->publish_year }}" name="publish_year" class="spinner-input form-control" min="0">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số Lượng</label>
                    <input type="number" name="quantity" value="{{ $book->quantity }}" class="spinner-input form-control" min="0">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Đánh Giá</label>
                    <input class="form-control" value="{{ $book->rating }}" name="rating">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô Tả Sách</label>
                    <textarea class="form-control" rows="3" name="abstract" >{{ $book->abstract }}</textarea>
                  </div>
                  <button type="submit" class="btn btn-success">Sửa Sách</button>
                  <button type="reset" class="btn btn-danger">Nhập Lại</button>
                </div>
              </form>
            </div>
            <br>
            <header class="panel-heading">
              Danh Sách Bình Luận
            </header>
            <div class="panel-body">
              <div class="clearfix">
                <div class="btn-group pull-right">
                  <button class="btn dropdown-toggle" data-toggle="dropdown">Công cụ <i class="fa fa-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu pull-right">
                    <li><a href="#">In</a></li>
                    <li><a href="#">Lưu ra pdf</a></li>
                    <li><a href="#">Lưu ra Excel</a></li>
                  </ul>
                </div>
              </div>
            </div>
            @if (session('thongbaoxoa'))
              <div class="alert alert-success">
                {{ session('thongbaoxoa') }}
              </div>
            @endif
            <table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                  <th><i class="fa fa-bullhorn"></i>User ID</th>
                  <th>User Name</th>
                  <th>Thời Gian</th>
                  <th>Đánh Giá</th>
                  <th>Nội Dung</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listReview as $element)
                <tr>
                  <th>{{ $element->user_id }}</th>
                  <th>{{ $element->user_name }}</th>
                  <th>{{ $element->review_date }}</th>
                  <th>{{ $element->rating }}</th>
                  <th>{{ $element->reviews }}</th>
                  <th>
                    <button class="btn btn-danger btn-xs"><a class="agiang" href="{{ route('getDeleteReview',['book_id'=>$element->book_id,'user_id'=>$element->user_id,'review_date'=>$element->review_date]) }}"><i class="fa fa-trash-o "></i></a></button>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="text-center">

            </div>
          </section>
        </div>
      </section>
    </div>
  </div>
  <!-- page end-->
</section>
@endsection