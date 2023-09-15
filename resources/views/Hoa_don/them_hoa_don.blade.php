<!DOCTYPE html>
<html>
<head>
    @include('module/head')
    <title>Thêm hóa đơn</title>
</head>
<body>
    <div class="container-fluid px-0">
        <form onsubmit="return check_form();" action="{{url('them_hoa_don')}}" method="post">
          {{csrf_field()}}
            <div id="main" class="row no-gutters p-3">
              <div>
                Người tạo
                <input type="text" name="nguoi_tao">
              </div>
              <div>
                Khác hàng
                <input type="text" name="khach_hang">
              </div>
              <div id="chi_tiet_hoa_dons">
                <div>
                  Sản phẩm
                  <select id="ma_san_pham_1" name="ma_san_pham_1">
                    @foreach ($san_phams as $san_pham)
                      <option value="{{$san_pham->ma_san_pham}}">{{$san_pham->ten_san_pham}}</option>    
                    @endforeach
                  </select>
                </div>
                <div>
                  Số lượng
                  <input type="number" name="so_luong_1">
                </div>
                <div>
                  Khuyến mãi
                  <input type="number" name="khuyen_mai_1">
                </div>
              </div>
              <button type="submit">Thêm</button>
              <button type="button" onclick="them_chi_tiet()">Thêm chi tiết</button>
            </div>
            <input type="text" id="so_chi_tiet_hoa_don" name="so_chi_tiet_hoa_don" value="1">
        </form>
    </div>
    <script>
      function them_chi_tiet(){
        var so_chi_tiet_hoa_don = parseInt($('#so_chi_tiet_hoa_don').val()) + 1;
        $('#so_chi_tiet_hoa_don').val(so_chi_tiet_hoa_don);
        var chi_tiet_hoa_dons = $('#chi_tiet_hoa_dons');
        var options = $('#ma_san_pham_1').children();
        var select = $('<select name="ma_san_pham_'+so_chi_tiet_hoa_don+'"></select>');
        options.each(function() {
          select.append($(this).clone());
        });
        var so_luong = $(' <input type="number" name="so_luong_'+so_chi_tiet_hoa_don+'">');
        var khuyen_mai = $('<input type="number" name="khuyen_mai_'+so_chi_tiet_hoa_don+'">');
        chi_tiet_hoa_dons.append(select);
        chi_tiet_hoa_dons.append(so_luong);
        chi_tiet_hoa_dons.append(khuyen_mai);
      }
    </script>
    @include('module/footer')
</body>
</html>