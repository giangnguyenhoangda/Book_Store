@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <aside class="profile-nav col-lg-3">
      <section class="panel">
        <div class="user-heading round">
          <a href="#">
            <img src="{{ asset('images/40848077334_db3b7055a3_o.jpg') }}" alt="">
          </a>
          <h1>{{ $admin->first_name.' '.$admin->last_name}}</h1>
          <p>{{ $admin->email }}</p>
        </div>

        <ul class="nav nav-pills nav-stacked">
          <li><a href="{{ route('getProfile',$admin->admin_id) }}"> <i class="fa fa-user"></i> Thông Tin</a></li>
          <li  class="active"><a href="{{ route('getContentProEdit',$admin->admin_id) }}"> <i class="fa fa-edit"></i> Sửa Thông Tin</a></li>
        </ul>

      </section>
    </aside>
    <aside class="profile-info col-lg-9">
      <section class="panel">
        <div class="bio-graph-heading">
          Cuộc đời đẹp khi bạn chơi nhiều.
        </div>
        <div class="panel-body bio-graph-info">
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
          <h1> Thông Tin Của Tôi</h1>
          <form class="form-horizontal" role="form" method="post" action="{{ route('postProfileEdit') }}">
            <div class="form-group">
              <label  class="col-lg-2 control-label">Tên</label>
              <div class="col-lg-6">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="admin_id" value="{{ $admin->admin_id }}">
                <input type="text" class="form-control" name="first_name" value="{{ $admin->first_name }}">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Họ</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" name="last_name" value="{{ $admin->last_name }}">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Địa Chỉ</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" name="address" value="{{ $admin->address }}">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Thành Phố</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" name="city" value="{{ $admin->city }}">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Email</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" name="email" value="{{ $admin->email }}">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Điện Thoại</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" name="phone" value="{{ $admin->phone }}">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Quyền</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" name="permission" value="{{ $admin->permission }}">
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-success">Lưu</button>
                <button type="reset" class="btn btn-default">Nhập Lại</button>
              </div>
            </div>
          </form>
        </div>
      </section>
      <section>
        <div class="panel panel-primary">
          <div class="panel-heading"> Thay Đổi Mật Khẩu Và Ảnh Đại Diện</div>
          <div class="panel-body">
            @if (session('thongbaothaydoithanhcong'))
            <div class="alert alert-success">
              {{ session('thongbaothaydoithanhcong') }}
            </div>
            @endif
            @if (session('thongbaothaydoiloi'))
            <div class="alert alert-warning">
              {{ session('thongbaothaydoiloi') }}
            </div>
            @endif
            <form class="form-horizontal" role="form" action="{{ route('postPasswordEdit') }}" method="post">
              <div class="form-group">
                <label  class="col-lg-2 control-label">Mật Khẩu Hiện Tại</label>
                <div class="col-lg-6">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="admin_id" value="{{ $admin->admin_id }}">
                  <input type="password" class="form-control" id="pass_old" name="pass_old">
                </div>
              </div>
              <div class="form-group">
                <label  class="col-lg-2 control-label">Mật Khẩu Mới</label>
                <div class="col-lg-6">
                  <input type="password" class="form-control" id="pass_new" name="pass_new">
                </div>
                <div id="thongbao_passnew">

                </div>
              </div>
              <div class="form-group">
                <label  class="col-lg-2 control-label">Nhập Lại Mật Khẩu</label>
                <div class="col-lg-6">
                  <input type="password" id="re_pass_new" class="form-control" name="re_pass_new">
                </div>
                <div id="thongbao_re_passnew">

                </div>
              </div>

              <div class="form-group">
                <label  class="col-lg-2 control-label">Thay Đổi Ảnh Đại Diện</label>
                <div class="col-lg-6">
                  <input type="file" class="file-pos">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button type="submit" class="btn btn-info">Lưu</button>
                  <button type="reset" class="btn btn-default">Nhập Lại</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </aside>
  </div>

  <!-- page end-->
</section>

<script type="text/javascript">
  $(document).ready(function (){
    $('#pass_new').on('change',function (){
      if($('#re_pass_new').val()!=''){
        if($('#re_pass_new').val()!=$('#pass_new').val()){
          document.getElementById('thongbao_passnew').innerHTML='2 mật khẩu phải giống nhau';
        }
        else{
          document.getElementById('thongbao_passnew').innerHTML='';
          document.getElementById('thongbao_re_passnew').innerHTML='';
        }
      }
    });
    $('#re_pass_new').on('change',function (){
      if($('#pass_new').val()!=''){
        if($('#re_pass_new').val()!=$('#pass_new').val()){
          document.getElementById('thongbao_re_passnew').innerHTML='2 mật khẩu phải giống nhau';
        }
        else{
          document.getElementById('thongbao_re_passnew').innerHTML='';
          document.getElementById('thongbao_passnew').innerHTML='';
        }
      }
    })
  })
</script>
@endsection