{{csrf_field()}}
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
	QUẢN LÝ NGƯỜI DÙNG / THÊM
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
	THÔNG TIN NGƯỜI DÙNG
</div>
<div class="col-md-6 p-3">
	<div class="form-group">
		<label for="tai_khoan">Tài khoản: </label>
		<input type="text" class="form-control require" name="tai_khoan" id="tai_khoan">
	</div>
	<div class="form-group">
    <label for="mat_khau_dang_nhap">Mật khẩu: </label>
		<input type="password" class="form-control require" id="mat_khau_dang_nhap" name="mat_khau" placeholder="Mật khẩu">
		<span toggle="#mat_khau_dang_nhap" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	</div>
	<div class="form-group">
		<label for="xac_nhan_mat_khau">Xác nhận mật khẩu: </label>
		<input type="password" class="form-control require" name="xac_nhan_mat_khau" id="xac_nhan_mat_khau" placeholder="Nhập lại mật khẩu">
	</div>
	<div class="form-group">
		Kích hoạt: <input type="checkbox" name="trang_thai" id="trang_thai">
	</div>
	<div class="form-group">
		<button class="btn font-weight-bold">Thêm người dùng</button>
	</div>
</div>
<script>
		const msg = '{{Session::get('alert')}}';
    const exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>