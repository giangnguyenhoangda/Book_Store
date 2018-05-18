	<h4>
   1. Địa chỉ giao hàng
 </h4>
 <div class="panel panel-default">
  <div class="panel-body">
    <form class="form-horizontal" action="">
      <div class="form-group">
        <label class="control-label col-sm-4" for="full_name">Họ tên</label>
        <div class="col-sm-8">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
          <input type="text" class="form-control" id="full_name" @if(session('full_name'))
          value="{{ session('full_name') }}"
          @else
          value="{{ session('UserLogin')->first_name.' '.session('UserLogin')->last_name }}"
          @endif placeholder="Nhập họ tên" name="full_name" style="width: 50%;">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="phone_number">Số điện thoại di động
        </label>
        <div class="col-sm-8">          
          <input type="text" class="form-control" id="phone_number" @if(session('phone_number'))
          value="{{ session('phone_number') }}"
          @else
          value="{{ session('UserLogin')->phone }}"
          @endif placeholder="Nhập số điện thoại" name="phone_number" style="width: 50%;">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="city">Tỉnh/Thành phố
        </label>
        <div class="col-sm-8">          
          <input type="text" class="form-control" id="city" @if(session('city'))
          value="{{ session('city') }}"
          @else
          value="{{ session('UserLogin')->city }}"
          @endif" placeholder="Nhập thành phố" name="city" style="width: 50%;">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="address">Địa chỉ
        </label>
        <div class="col-sm-8">
          @if(session('address'))
          <textarea type="text" class="form-control"  id="address" placeholder="Ví dụ: số 12, Trần Hưng Đạo" name="address" style="width: 50%;">{{ session('address') }}</textarea>
          @else
          <textarea type="text" class="form-control"  id="address" placeholder="Ví dụ: số 12, Trần Hưng Đạo" name="address" style="width: 50%;">{{ session('UserLogin')->address }}</textarea>
          @endif          
          
        </div>
      </div>

      <div class="form-group">        
        <div class="col-sm-offset-4 col-sm-8">
          <button type="button" class="btn btn-default" id="huybo" style="width: 120px; height: 40px">Hủy bỏ</button>
          <button type="button" class="btn btn-primary" id="getContentPayMent" style="width: 120px; height: 40px;">Tiếp tục</button>
        </div>
      </div>
    </form>

  </div>
</div>

<script >
  $(document).ready(function (){
    $('#getContentPayMent').on('click',function (){
      //alert('Đã click');
      if ($('#full_name').val()=='' || $('#phone_number').val()=='' || $('#city').val()==''|| $('#address').val()=='') {
        alert('Bạn chưa nhập đủ dữ liệu');
      }
      else{
        $.ajax({
          url: "{{ route('postSetInfo') }}",
          method: 'post',
          data:{
            _token: $('#_token').val(),
            full_name:$('#full_name').val(),
            phone_number:$('#phone_number').val(),
            city:$('#city').val(),
            address:$('#address').val()
          },
          success: function(result){
            $('#contentbuybook').load('{{ route('getContentPayment') }}');
          }
        });
      }
    });

    $('#huybo').on('click',function (){
      if (confirm('Bạn có chắc muốn hủy bỏ')) 
      {
        window.location.replace("{{ route('cart') }}");
      }
    });
  });
</script>