<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
  @include('module/head')
</head>
<body style="background-image: linear-gradient(to top left, #eed, #edd);">
	<div class="container">
		<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
			<div class="col-md-4">
				<h3 class="mb-4 text-center">ĐĂNG NHẬP</h3>
				<form action="{{url('dang_nhap_process')}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<input type="text" class="form-control" id="ten_tai_khoan_dang_nhap" name="tai_khoan" placeholder="Tên tài khoản" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="mat_khau_dang_nhap" name="mat_khau" placeholder="Mật khẩu" required>
					</div>
					<div class="form-group text-center">
						<button class="btn btn-md font-weight-bold" type="submit">Đăng Nhập</button>
					</div>
				</form>
				{{-- Lỗi "Undefined variable $bao_loi" xuất hiện vì biến $bao_loi không được định nghĩa trong tất cả các trường hợp 
				khi trang web được truy cập. Trong trường hợp này, biến $bao_loi được sử dụng để hiển thị thông báo lỗi trên trang đăng nhập, 
				nhưng nó chỉ được gán giá trị trong trường hợp xử lý đăng nhập. --}}
				<script>
					@if(isset($bao_loi) && $bao_loi != '')
							alert('{{$bao_loi}}');
					@endif
				</script>
				<div class="mt-3 text-center">
					<a href="#">Quên mật khẩu?</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>