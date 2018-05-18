
<h4>
 2. Chọn phương thức thanh toán
</h4>
<div class="row">
  <div class="col-sm-8">
    <div class="panel panel-default">
      <div class="panel-body">

        <form class="form-horizontal" action="{{ route('postDatHang') }}" method="post">
          <div>
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="is_pay_by_money" id="is_pay_by_money" value="true">
            <label><input type="radio" name="pay_by_money" id="pay_by_money" checked="true">Thanh toán tiền mặt khi nhận hàng
            </label>
          </div>
          <div>
            <label><input type="radio" id="pay_by_atm" name="pay_by_atm">Thẻ ATM nội địa/Internet Banking (Miễn phí thanh toán)</label>
            <div id="atm">
              {{-- HẾT --}}
            </div>
          </div>

          <div class="form-group">        
            <div class="col-sm-8">
              <button type="button" class="btn btn-primary" id="getContentChekout" style="width: 200px; height: 40px;">Quay lại
              </button>
              <button type="button" class="btn btn-primary" id="dathang" style="width: 200px; height: 40px;">Đặt hàng
              </button>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body">

          <p>Địa chỉ giao hàng</p>

          <div style="border-top: 1px solid #c9c9c9; padding-top: 10px;
          margin-top: 10px;">
          <h4 id="receiver_name">{{ session('full_name') }}</h4>
          <div style="margin-top: 10px;">
            <p id="receiver_address">
              {{ session('address') }}
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-body">

        <p>Đơn hàng (<span id="number_products">2</span>)sản phẩm</p>
        <div style=" padding-top: 10px;
        margin-top: 10px;">
        <table class="table" id="order_list">

          <tbody>
            @php
            $cart=Session::get('cart');
            @endphp
            @foreach ($cart->items as $book)
            <tr>
              <td><span id="number1">{{ $book['qty'] }} x </span>{{ $book['item']->book_name }}</td>
              <td style="text-align: right;"><span id="price">{{number_format($book['price'], 0, ',', '.')}} đ</span></td>

            </tr>
            @endforeach
          </tbody>
        </table>
        <table class="table" id="total_order_list">
          <tr>
            <td>Tạm tính</td>
            <td style="text-align: right;"><span id="price1">{{ $cart->totalPrice }}đ</span></td>
          </tr>
          <tr>
            <td>Phí vận chuyển</td>
            <td style="text-align: right;"><span id="price2">12.000đ</span></td>
          </tr>
          <tr>
            <td><h4><b>Thành tiền</b></h4></td>
            <td style="text-align: right;"><h4><b><span id="total">{{ $cart->totalPrice + 12000}}đ<b></span></h4></td>

            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script >
  $(document).ready(function (){

    $('#pay_by_money').on('click',function (){
      $("#pay_by_atm").prop("checked", false);
      document.getElementById('is_pay_by_money').value="true";
      document.getElementById('atm').innerHTML='';
      document.getElementById('price2').innerHTML='12.000đ';
      document.getElementById('total').innerHTML={{ $cart->totalPrice + 12000}};
    });

    $('#pay_by_atm').on('click',function (){
      $("#pay_by_money").prop("checked", false);
      document.getElementById('is_pay_by_money').value="false";
      var str='';
      str+='<div class="panel panel-default" id="credit_card_info" style="padding-left: 30px;">';
      str+='  <div class="panel-body">';

      str+='    <div class="form-group" id="div-card-num">';
      str+='      <label >Số thẻ:</label>';

      str+='      <input type="text" class="form-control" id="card_number" name="card_number" placeholder="VD: 4123 4567 8901 2345" value="" style="width: 40%;">';

      str+='    </div>';
      str+='    <div class="form-group" id="card_name">';
      str+='      <label for="bill_to_name">Tên in trên thẻ:</label>';
      str+='      <input type="text" class="form-control" id="bill_to_name" name="bill_to_name" placeholder="vd: Nguyen Van A" value="" style="width: 40%;">';
      str+='    </div>';
      str+='    <div class="form-group" id="select-card-date">';
      str+='      <label for="card_expiry">Ngày hết hạn:</label>';
      str+='      <div class="end-date-cvc">';
      str+='        <input type="date" id="card_expiry" name="card_expiry_date" class="form-control is-small-2 " value="" placeholder="MM/YY" autocomplete="off" style="width: 40%">';
      str+='      </div>';

      str+='    </div>';
      str+='    <div class="form-group">';
      str+='      <label for="card_type">Loại Thẻ:</label>'
      str+='      <div class="end-date-cvc">'
      str+='       <input type="text" class="form-control is-small-2" id="id_card_type" name="card_type"  value="" autocomplete="off" style="width: 40%">';

      str+='      </div>';

      str+='    </div>';
      str+='          </div>';
      str+='        </div>';
      document.getElementById('atm').innerHTML=str;
      document.getElementById('price2').innerHTML='0đ';
      document.getElementById('total').innerHTML={{ $cart->totalPrice }};
    });

    $("#getContentChekout").on("click",function (){
      $("#contentbuybook").load("{{ route('getContentCheckOut') }}");
    });

    $('#dathang').on('click',function (){
      if($('#is_pay_by_money').val()!='true'){
        var card_number=$('#card_number').val();
        var bill_to_name=$('#bill_to_name').val();
        var card_expiry_date=$('#card_expiry').val();
        var id_card_type=$('#id_card_type').val();
        if (card_number=='' || bill_to_name=='' || card_expiry_date=='' ||  id_card_type=='') 
        {
          alert('Bạn chưa nhập đủ thông tin thẻ ngân hàng');
        }
        else{
          $.ajax({

            url:"{{url('check-exist-credit-card') }}"+'/'+$('#card_number').val(),
            method: 'get',
            success: function(result){
              if(result==1){
                alert('Thẻ đã được đăng ký. Vui lòng nhập mã thẻ khác.')
              }
              else{
                alert('Đặt hàng');

                $.ajax({
                  url:"{{ route('postDatHang') }}",
                  method: 'post',
                  data: {
                    _token:$('#_token').val(),
                    card_number:$('#card_number').val(),
                    bill_to_name:$('#bill_to_name').val(),
                    card_expiry_date:$('#card_expiry').val(),
                    card_type:$('#id_card_type').val(),
                    is_pay_by_money:$('#is_pay_by_money').val()
                  },
                  success: function(result){
                    window.location.replace("{{ route('getThongBao') }}");
                  }
                });
              }
            }
          });
          
        }
      }
      else{
        alert('Đặt hàng');
        $.ajax({
          url: "{{ route('postDatHang') }}",
          method: 'post',
          data: {
            _token:$('#_token').val(),
            is_pay_by_money:$('#is_pay_by_money').val()
          },
          success: function(result){
            window.location.replace("{{ route('getThongBao') }}");
          }
        });
      }
      
      
    });

  });
</script>

