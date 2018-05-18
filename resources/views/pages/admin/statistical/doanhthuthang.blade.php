@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Thống Kê Doanh Thu Năm
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
          <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-3">
                <label >Năm:</label>
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="number" id="year" name="" min="0" class="form-control" style="width: 100%">
                <div id="yearloi"><p >&nbsp;</p></div>
              </div>
              <div class="col-sm-3">
                <div>
                  <label><h3>&nbsp;</h3></label>
                  <button id="btnView" class="btn btn-success">Xem Chi Tiết</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                  <th><i class="fa fa-bullhorn"></i>Tháng </th>
                  <th>Doanh Thu</th>
                </tr>
              </thead>
              <tbody id="bang">
              </tbody>
            </table>
            <div class="text-center">
            </div>
          </div>
          <div class="col-sm-6 text-center">
            <h1>Tổng Doanh Thu</h1>
            <p style="color: red; font-size: 40px;" id="tongdoanhthu">0 đ</p>
          </div>
        </div>
        
      </section>
    </div>
  </div>
  <!-- page end-->
</section>

<script type="text/javascript">
  $(document).ready(function (){

    $('#btnView').on('click',function (){
      var year=$('#year').val();
      if(year!=''){
        document.getElementById('yearloi').innerHTML='<p >&nbsp;</p>';
        $.ajax({
          url: "{{ url('') }}"+'/'+'statistical/doanhthunam',
          method: 'post',
          data: {
            _token: $('#_token').val(),
            year:$('#year').val()
          },
          success: function (result){
            document.getElementById('bang').innerHTML=result['str'];
            document.getElementById('tongdoanhthu').innerHTML=result['total']+' '+'VND';
          }
        });
      }
      else{
        if(year==''){
          document.getElementById('yearloi').innerHTML='<p style="color: red">Chưa chọn năm</p>';
        }
        else{
          document.getElementById('yearloi').innerHTML='<p >&nbsp;</p>';

        }
      }
    });

    $('#export_excel').on('click',function (){
      if(confirm("Bạn có muốn xuất ra file excel")){
        if($('#year').val()==''){
          alert('Bạn chưa chọn năm.');
        }else{
          $.ajax({
            url:"{{ route('postExportThongKeDoanhThuNam') }}",
            method: 'post',
            data: {
              _token: $('#_token').val(),
              year:$('#year').val()
            },
            success: function(result){
              alert('Xuất ra file excel thành công. Xem trong public/export của server.');
            }
          });
        }
      }
    });

  });
</script>
@endsection