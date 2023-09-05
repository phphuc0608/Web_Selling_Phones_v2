{{csrf_field()}}
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  THÊM SẢN PHẨM
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN SẢN PHẨM
</div>  
<div class="col-md-6 px-3 pt-3">
  <div class="form-group">
    <label for="ten_san_pham">Tên sản phẩm</label>
    <input name="ten_san_pham" type="text" class="form-control require" id="ten_san_pham">
  </div>
  <div class="form-group">
    <label for="ma_loai_san_pham">Loại sản phẩm</label>
    <select name="ma_loai_san_pham" id="ma_loai_san_pham" class="form-control">
        @foreach($loai_san_phams as $loai_san_pham)
          <option value='{{$loai_san_pham->ma_loai_san_pham}}'>{{$loai_san_pham->ten_loai_san_pham}}</option>
        @endforeach
    </select>
  </div>  
  <div class="form-group">
    <label for="ma_nha_san_xuat">Nhà sản xuất</label>
    <select name="ma_nha_san_xuat" id="ma_nha_san_xuat" class="form-control">
        @foreach($nha_san_xuats as $nha_san_xuat)
          <option value='{{$nha_san_xuat->ma_nha_san_xuat}}'>{{$nha_san_xuat->ten_nha_san_xuat}}</option>
        @endforeach
    </select>
  </div>
</div>
<div class="col-md-6 px-3 pt-3">        
  <div class="form-group">
    <label for="gia">Giá</label>
    <input name="gia" type="number" class="form-control require positive_number" id="gia">
  </div>    
  <div class="form-group">
    <label for="hinh_anh">Hình ảnh</label>
    <div class="custom-file">
      <input name="hinh_anh" type="file" class="custom-file-input" id="hinh_anh">
      <label class="custom-file-label" for="customFile">Chọn file ảnh</label>
    </div>
  </div>
  <div class="form-group">
    <label for="so_phan_tram_giam">Số phần trăm giảm</label>
    <input name="so_phan_tram_giam" type="number" step="0.01" min="0" max="100" class="form-control require positive_number" id="so_phan_tram_giam">
  </div> 
  <div class="form-group form-check">
    <label class="form-check-label">
      <input name="trang_thai" type="checkbox" class="form-check-input">
      Kích hoạt
    </label>
  </div>    
</div>
<div class="col-md-12 px-3">
  <div class="form-group">
    <label for="mo_ta">Mô tả</label>
    <textarea name="mo_ta" class="form-control require" id="mo_ta" rows="4"></textarea>
  </div>
</div>
<div class="col-md-12 px-3">
  <div class="form-group">
    <button type="submit" class="btn font-weight-bold">Thêm sản phẩm <i class="bi bi-plus-circle-fill"></i></button>
  </div>        
</div>