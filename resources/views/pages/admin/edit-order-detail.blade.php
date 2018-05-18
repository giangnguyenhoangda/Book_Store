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
              Thông Tin Đặt Hàng
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
              <form role="form" action="{{ route('postEditOrderDetail') }}" method="POST" enctype="multipart/form-data">
                @foreach ($item as $element)
                <div class="col-sm-8">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Order ID</label>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input class="form-control" name="order_id" value="{{ $element->order_id }}" readonly="">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">User ID</label>
                      <input class="form-control" name="user_id" readonly="" value="{{ $element->user_id }}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Người Nhận</label>
                      <input class="form-control" name="receiver_name" readonly="" value="{{ $element->receiver_name }}">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Địa Chỉ</label>
                      <input class="form-control" name="address" readonly="" value="{{ $element->address }}" >
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Thành Phố</label>
                      <input name="city" class="spinner-input form-control" readonly="" value="{{ $element->city }}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Thời Gian Đặt Hàng</label>
                      <input class="form-control" name="date_created" readonly="" value="{{ $element->date_created }}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phương Thức Thanh Toán</label>
                      <input class="form-control" name="method_payment" @if ($element->method_payment=0)
                      value="Tiền Mặt" 
                      @else
                      value="ATM"
                      @endif readonly="">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Trạng Thái</label>
                      <select class="form-control m-bot15" name="status">
                        @if ($element->status==-1)
                        <option value="-1" selected="">Từ Chối</option>
                        <option value="0">Đang Duyệt</option>
                        <option value="1">Chấp Nhận</option>
                        @elseif($element->status==0)
                        <option value="-1">Từ Chối</option>
                        <option value="0" selected="">Đang Duyệt</option>
                        <option value="1">Chấp Nhận</option>
                        @else
                        <option value="-1">Từ Chối</option>
                        <option value="0">Đang Duyệt</option>
                        <option value="1" selected="">Chấp Nhận</option>
                        @endif
                      </select>
                    </div>
                  </div> 
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Thời Gian Nhận</label>
                      <input type="datetime-local" name="date_received" @if ($element->date_received!='')
                      value="{{ date('Y-m-d',strtotime($element->date_received)).'T'.date('H:m',strtotime($element->date_received)) }}"
                      @endif class="spinner-input form-control">
                    </div>
                  </div> 
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tổng Tiền</label>
                      <input class="form-control" readonly="" name="total_money" value="{{ $element->total_money }}">
                    </div>
                  </div> 
                  @endforeach

                </div>
                <div class="col-sm-4">
                  <br>
                  <div class="col-sm-12">
                    <button type="button" class="btn btn-primary"><a class="agiang" href="{{ route('getListOrderDetail') }}">Xem Danh Sách Đơn Hàng</a></button>
                  </div>
                  <div class="col-sm-12">
                    <br>
                    <button type="submit" class="btn btn-success">Sửa Thông Tin Đặt Hàng</button>
                  </div>
                  <div class="col-sm-12">
                    <br>
                    <button type="reset" class="btn btn-danger">Nhập Lại</button>
                  </div>

                </div>
              </form>
            </div>
            <br>
            <header class="panel-heading">
              Danh Sách Sách
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
            <table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                  <th><i class="fa fa-bullhorn"></i> ID</th>
                  <th>Ảnh Bìa</th>
                  <th class="hidden-phone" style="width: 28%"><i class="fa fa-question-circle"></i> Tên Sách</th>
                  <th>Tác Giả</th>
                  <th>Thể Loại</th>
                  <th>Ngôn Ngữ</th>
                  <th>Năm Xuất Bản</th>
                  <th style="width: 10%">Nhà Xuất Bản</th>
                  <th>Giá</th>
                  <th>Số Lượng</th>
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
                <td>{{number_format($book->price, 0, ',', '.')}} đ</td>
                <td>{{ $book->quantity }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-center">
           {{ $listBook->links() }}
         </div>
       </section>
     </div>
   </section>
 </div>
</div>

<!-- page end-->
</section>
@endsection