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
              Thêm Thể Loại
            </header>
            <div class="panel-body">
              <div class="col-sm-12">
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
              </div>
              <form role="form" action="{{ route('postAddCategory') }}" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên Thể Loại</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input class="form-control" name="txtCateName" placeholder="Nhập Tên Thể Loại">
                </div>
                <button type="submit" class="btn btn-success">Thêm thể loại</button>
                <button type="reset" class="btn btn-danger">Nhập lại</button>
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