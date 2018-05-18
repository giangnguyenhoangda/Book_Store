@extends('pages.admin.frame')
@section('content')
<section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Thống Kê Doanh Thu
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
                <label >Từ:</label>
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="date" id="time1" name="" class="form-control" style="width: 100%">
                <div id="time1loi"><p >&nbsp;</p></div>
              </div>
              <div class="col-sm-3">
                <label >Đến:</label>
                <input type="date" id="time2" name="" class="form-control" style="width: 100%">
                <div id="time2loi"><p>&nbsp;</p></div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="col-sm-12">
                <button id="btnView" class="btn btn-success">Xem Chi Tiết</button>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                  <th><i class="fa fa-bullhorn"></i>Ngày </th>
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
      var time1=$('#time1').val();
      var time2=$('#time2').val();
      if(time1!=''&&time2!=''){
        document.getElementById('time1loi').innerHTML='<p >&nbsp;</p>';
        document.getElementById('time2loi').innerHTML='<p >&nbsp;</p>';
        $.ajax({
          url: "{{ url('') }}"+'/'+'tinhdoanhthutrongkhoangthoigian',
          method: 'post',
          data: {
            _token: $('#_token').val(),
            time1:$('#time1').val(),
            time2:$('#time2').val()
          },
          success: function (result){
            document.getElementById('bang').innerHTML=result['str'];
            document.getElementById('tongdoanhthu').innerHTML=result['total']+' VND';
          }
        });
      }
      else{
        if(time1==''){
          document.getElementById('time1loi').innerHTML='<p style="color: red">Chưa chọn thời gian</p>';
        }
        else{
          document.getElementById('time1loi').innerHTML='<p >&nbsp;</p>';

        }
        if(time2==''){
          document.getElementById('time2loi').innerHTML='<p style="color: red">Chưa chọn thời gian</p>';
        }
        else{
          document.getElementById('time2loi').innerHTML='<p >&nbsp;</p>';
        }
      }
    });

    $('#export_excel').on('click',function (){
      if(confirm("Bạn có muốn xuất ra file excel")){
        if ($('#time1').val()==''&&$('#time2').val()=='') 
        {
          alert('Bạn chưa chọn đủ khoảng thời gian');
        }
        else {
          $.ajax({
            url:"{{ route('postExportThongKeDoanhThuNgayThang') }}",
            method:'post',
            data:{
              _token: $('#_token').val(),
              time1:$('#time1').val(),
              time2:$('#time2').val()
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