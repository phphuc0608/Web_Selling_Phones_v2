{{csrf_field()}}
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
  QUẢN LÝ SẢN PHẨM
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
  THÔNG TIN SẢN PHẨM
</div>
<div class="col-md-6 p-3">
  <div class="form-group">
    <label for="tu_khoa">Từ khóa</label>
    <input type="text" class="form-control" id="tu_khoa" name="tu_khoa">
  </div>
  <div class="form-group">
    <label for="loai_san_pham">Loại sản phẩm</label>
    <select id="loai_san_pham" class="form-control" name="ma_loai_san_pham">
    </select>
  </div>  
  <div class="form-group form-check p-0">
    <label>Trạng thái</label>
        <select name="trang_thai" class="form-control trang_thai">                                      
        </select>
    </div>
</div>
<div class="col-md-6 p-3">
  <div class="form-group">
    <label for="nha_san_xuat">Nhà sản xuất</label>
    <select id="ma_nha_san_xuat" class="form-control" name="ma_nha_san_xuat">
    </select>
  </div>
  <div class="form-group">
    <label for="gia">Giá</label>
    <input type="number" class="form-control" id="gia" name="gia">
  </div>        
</div>
<div class="col-md-12">
  <div class="form-group">
    <button type="submit" class="btn font-weight-bold">Tìm kiếm <i style="font-size: 20px;" class='bx bx-search'></i></button>
    <a href="{{asset('them_san_pham')}}"><button type="button" class="btn font-weight-bold ml-2">Thêm sản phẩm <i class="bi bi-plus-circle-fill"></i></button></a>          
  </div>        
</div>