{{csrf_field()}}
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  QUẢN LÝ TIN TỨC / CẬP NHẬT
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN TIN TỨC
</div>
<div class="col-md-7 p-3">
  <input readonly type="hidden" id="ma_tin_tuc" name="ma_tin_tuc" value="{{$tin_tuc->ma_tin_tuc}}">
  <div class="form-group">
      <label for="tieu_de">Tiêu đề</label>
      <input type="text" class="form-control require" id="tieu_de" name="tieu_de" value="{{$tin_tuc->tieu_de}}">
  </div>
  <div class="form-group">
      <label for="ma_loai_tin_tuc">Loại tin tức</label>
      <select class="form-control" name="ma_loai_tin_tuc" >
        @foreach($loai_tin_tucs as $loai_tin_tuc)
          @if($loai_tin_tuc->ma_loai_tin_tuc == $tin_tuc->ma_loai_tin_tuc)
            <option selected value="{{$loai_tin_tuc->ma_loai_tin_tuc}}">{{$loai_tin_tuc->ten_loai_tin_tuc}}</option>
          @else
            <option value="{{$loai_tin_tuc->ma_loai_tin_tuc}}">{{$loai_tin_tuc->ten_loai_tin_tuc}}</option>
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
  <div class="form-group form-check">
      <label class="form-check-label">
          <input type="checkbox" class="form-check-input" name="trang_thai" {{$tin_tuc->trang_thai?'checked':''}}>
          Kích hoạt
      </label>
  </div>
</div>
<div class="col-md-5 p-3 d-flex justify-content-center align-items-center">
  <img class="img-thumbnail img-fluid mt-3" src="{{asset('tin_tuc/'.$tin_tuc->hinh_anh.'')}}" style="object-fit: cover; width: 250px;">
</div>
<div class="col-md-12 p-3" style="margin-top: -40px;">
  <div class="form-group">
      <label for="tom_tat">Tóm tắt</label>
      <textarea class="form-control require" id="tom_tat" cols="30" rows="3" name="tom_tat">{{$tin_tuc->tom_tat}}</textarea> 
  </div>
  <div class="form-group">
      <label for="noi_dung">Nội dung</label>
      <textarea class="form-control require" id="noi_dung" cols="30" rows="10" name="noi_dung">{{$tin_tuc->noi_dung}}</textarea> 
  </div>
  <div class="form-group pt-3">
      <button class="btn font-weight-bold">Cập nhật tin tức <i class="bi bi-pencil-square"></i></button>
  </div>
</div>