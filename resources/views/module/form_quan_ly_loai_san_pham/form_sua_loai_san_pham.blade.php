{{csrf_field()}}
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  SỬA LOẠI SẢN PHẨM
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN LOẠI SẢN PHẨM
</div>
<div class="col-md-7 p-3">
  <label for="ma_loai_san_pham">Mã loại sản phẩm</label>
  <input readonly class="form-control require" type="text" name="ma_loai_san_pham" value="{{$loai_san_pham->ma_loai_san_pham}}">
  <div class="form-group">
    <label for="ten_loai_san_pham">Tên loại sản phẩm</label>
    <input type="text" class="form-control require" name="ten_loai_san_pham" id="ten_loai_san_pham" value="{{$loai_san_pham->ten_loai_san_pham}}">
  </div>
  <div class="form-group">
    <label for="hinh_anh">Hình ảnh</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh">
        <label class="custom-file-label" for="customFile">Chọn file ảnh</label>
    </div>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input name="trang_thai" type="checkbox" class="form-check-input" {{$loai_san_pham->trang_thai?'checked':''}}>
      Kích hoạt
    </label>
  </div>
</div>
<div class="col-md-5 p-3 d-flex justify-content-center align-items-center">
  <img class="img-thumbnail" src="{{asset('loai_san_pham/'.$loai_san_pham->hinh_anh.'')}}" style="object-fit: cover; width: 250px;">
</div>
<div class="col-md-12">
  <div class="form-group">
    <button type="submit" class="btn font-weight-bold">Cập nhập loại sản phẩm <i class='bx bxs-edit'></i></button>
  </div>
</div>