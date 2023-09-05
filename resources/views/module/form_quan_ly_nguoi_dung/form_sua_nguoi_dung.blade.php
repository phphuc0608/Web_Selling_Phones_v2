{{csrf_field()}}
<div class="col-md-12 px-3 py-2 mb-3 rounded font-weight-bold" id="function_name">
	QUẢN LÝ NGƯỜI DÙNG / SỬA
</div>
<div class="col-md-12 box_title px-3 py-2 rounded-top font-weight-bold">
	Sửa thông tin người dùng
</div>
<div class="col-md-6 p-3">
	<div class="form-group">
		<label for="tai_khoan">Tài khoản: </label>
		<input type="text" readonly class="form-control" name="ten_tai_khoan" id="ten_tai_khoan" value="{{$nguoi_dung->tai_khoan}}">
	</div>
	<div class="form-group">
		<label for="mat_khau">Mật khẩu: </label>
		<input type="password" class="form-control" name="mat_khau" id="mat_khau">
	</div>
	<div class="form-group">
		<label for="xac_nhan_mat_khau">Xác nhận mật khẩu: </label>
		<input type="password" class="form-control" name="xac_nhan_mat_khau" id="xac_nhan_mat_khau" placeholder="Nhập lại mật khẩu">
	</div>
	<div class="form-group">
		Kích hoạt: <input type="checkbox" name="trang_thai" id="trang_thai"  {{$nguoi_dung->trang_thai?'checked':''}}>
	</div>
	<div class="form-group">
		<button class="btn font-weight-bold">Sửa người dùng</button>
	</div>
</div>
<script>
  const msg = '{{Session::get('alert')}}';
  const exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>