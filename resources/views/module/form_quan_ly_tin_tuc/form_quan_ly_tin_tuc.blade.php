{{csrf_field()}}
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  QUẢN LÝ TIN TỨC / QUẢN LÝ
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN TIN TỨC
</div>
<div class="col-md-7 p-3">
  <div class="form-group">
      <label for="tu_khoa">Từ khóa</label>
      <input type="text" class="form-control" id="tu_khoa" name="tu_khoa" 
      <?php
      /*
      Khi nhập từ khóa và nhấn tìm kiếm thì giá trị của từ khóa được lưu trong SESSION 
      và khi quay về muốn hiện từ khóa ta đã nhập trước đó thì ta lôi từ khóa ở trong SESSION ra
      */
          // if(isset($_SESSION['tu_khoa_tin_tuc']))
          //     echo 'value = "'.$_SESSION['tu_khoa_tin_tuc'].'"'; 
      ?>
      >
  </div>
  <div class="form-group">
      <label for="tu_ngay">Từ ngày</label>
      <input placeholder="dd/mm/yyyy" type="text" class="form-control" id="tu_ngay" name="tu_ngay" value="<?php 
          // if(isset($_SESSION['tu_ngay_tin_tuc']))
          //     if($_SESSION['tu_ngay_tin_tuc'] != '')
          //         echo format_date_vn($_SESSION['tu_ngay_tin_tuc']);
      ?>">
  </div>
  <div class="form-group">
      <label for="den_ngay">Đến ngày</label>
      <input placeholder="dd/mm/yyyy" type="text" class="form-control" id="den_ngay" name="den_ngay" value="<?php
          // if(isset($_SESSION['den_ngay_tin_tuc']))
          //     if($_SESSION['den_ngay_tin_tuc'] != '')
          //         echo format_date_vn($_SESSION['den_ngay_tin_tuc']);
      ?>">
  </div>
  <div class="form-group">
      <label for="ma_loai_tin_tuc">Loại tin tức</label>
      <select class="form-control" id="ma_loai_tin_tuc" name="ma_loai_tin_tuc">
        @foreach($loai_tin_tucs as $loai_tin_tuc)
          <option value="{{$loai_tin_tuc->ma_loai_tin_tuc}}">{{$loai_tin_tuc->ten_loai_tin_tuc}}</option>
        @endforeach
      </select>
  </div>
  <div class="form-group form-check p-0">
  <label>Trạng thái</label>
    <select name="trang_thai" class="form-control trang_thai">
        <?php
            // $trang_thais = array('-1' => 'Tất cả', '0' => 'Khóa', '1' => 'Kích hoạt');
            // foreach($trang_thais as $key => $value){
            //     if($_SESSION['trang_thai_tin_tuc'] == $key)
            //         echo "<option selected value='{$key}'>$value</option>";                   
            //     else
            //         echo "<option value='{$key}'>$value</option>";
            // }
        ?>                                       
        </select>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
      <div class="form-inline">
          <button class="btn font-weight-bold">Tìm kiếm tin tức <i class="bi bi-search"></i></button>
          <a href="{{asset('them_tin_tuc')}}"><button type="button" class="btn font-weight-bold ml-5">Thêm tin tức <i class="bi bi-plus-circle-fill"></i></button></a>          
      </div>
  </div>
</div>