{{csrf_field()}}
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  SỬA SẢN PHẨM
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN SẢN PHẨM
</div>
<div class="col-md-7 p-3">
  <input readonly type="text" name="ma_san_pham" style="display: none;" value = "{{$san_pham->ma_san_pham}}">
  <div class="form-group">
    <label for="ten_san_pham">Tên sản phẩm</label>
    <input type="text" class="form-control require" id="ten_san_pham" name="ten_san_pham" value ="{{$san_pham->ten_san_pham}}">
  </div>
  <div class="form-group">
    <label for="ma_loai_san_pham">Loại sản phẩm</label>
    <select name="ma_loai_san_pham" id="ma_loai_san_pham" class="form-control">
      @foreach($loai_san_phams as $loai_san_pham)
        @if($loai_san_pham->ma_loai_san_pham == $san_pham->ma_loai_san_pham)
          <option selected value="{{$loai_san_pham->ma_loai_san_pham}}">{{$loai_san_pham->ten_loai_san_pham}}</option>
        @else
        <option value="{{$loai_san_pham->ma_loai_san_pham}}">{{$loai_san_pham->ten_loai_san_pham}}</option>
        @endif
      @endforeach
    </select>
  </div>  
  <div class="form-group">
    <label for="ma_nha_san_xuat">Nhà sản xuất</label>
    <select name="ma_nha_san_xuat" id="ma_nha_san_xuat" class="form-control">
      @foreach($nha_san_xuats as $nha_san_xuat)
        @if($nha_san_xuat->ma_nha_san_xuat == $san_pham->ma_nha_san_xuat)
          <option selected value="{{$nha_san_xuat->ma_nha_san_xuat}}">{{$nha_san_xuat->ten_nha_san_xuat}}</option>
        @else
        <option value="{{$nha_san_xuat->ma_nha_san_xuat}}">{{$nha_san_xuat->ten_nha_san_xuat}}</option>
        @endif
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="hinh_anh">Hình ảnh</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh">
        <label class="custom-file-label" for="customFile">Chọn file ảnh</label>
    </div>
  </div>
  <div class="form-group">
    <label for="gia">Giá</label>
    <input type="number" class="form-control require positive_number" id="gia" name="gia" value="{{$san_pham->gia}}">
  </div> 
  <div class="form-group">
    <label for="so_phan_tram_giam">Số phần trăm giảm:</label>
    <input type="number" step="0.01" min="0" max="100" class="form-control require positive_number" id="so_phan_tram_giam" name="so_phan_tram_giam" value="{{ $so_phan_tram_giam }}">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input name="trang_thai" type="checkbox" class="form-check-input" {{$san_pham->trang_thai?'checked':''}}>
      Kích hoạt
    </label>
  </div>
</div>
<div class="col-md-5 p-3 d-flex justify-content-center align-items-center">
  <img class="img-thumbnail" src="{{asset('san_pham/'.$san_pham->hinh_anh.'')}}" style="object-fit: cover; width: 250px;">
</div>
<div class="col-md-12 px-3">
  <div class="form-group">
    <label for="mo_ta">Mô tả</label>
    <textarea class="form-control require" id="mo_ta" rows="4" name="mo_ta"><?php echo $san_pham['mo_ta']; ?></textarea>
  </div>
</div>
<div class="col-md-12 px-3">
  <div class="form-group">
    <button type="submit" class="btn font-weight-bold">Cập nhập sản phẩm <i style="font-size: 20px;" class='bx bxs-edit'></i></button>
  </div>        
</div>	