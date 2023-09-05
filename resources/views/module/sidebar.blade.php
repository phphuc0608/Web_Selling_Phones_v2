<div id="menu">
    <div id="logo" class="row no-gutters">
      <div class="col-9 py-2">
        <img src="{{asset('img/logo.png')}}" class="img-fluid">
      </div>
      <div class="col-3 pt-3 pl-4">
        <button class="navbar-toggler px-2 py-1 mt-1" type="button" onclick="toggleNav()">
          <i class="bi bi-list text-color-2"></i>
        </button>
      </div>
    </div>
    <ul class="nav flex-column mt-2">
      <li class="nav-item p-1">
        <a class="nav-link" href="{{route('them_nguoi_dung',1)}}">Quản lý người dùng</a>
        <a href="{{route('them_nguoi_dung',1)}}"><span class="bi bi-people-fill"></span></a>
      </li>
      <li class="nav-item p-1">
        <a class="nav-link" href="{{route('them_loai_san_pham',1)}}">Quản lý loại sản phẩm</a>
        <a  href="{{route('them_loai_san_pham',1)}}"><span class="bi bi-collection-fill"></span></a>
      </li>
      <li class="nav-item p-1">
        <a class="nav-link" href="{{route('them_nha_san_xuat',1)}}">Quản lý nhà sản xuất</a>
        <a href="{{route('them_nha_san_xuat',1)}}"><span class="bi bi-collection-fill"></span></a>
      </li>
      <li class="nav-item p-1">
        <a class="nav-link" href="{{route('them_loai_tin_tuc',1)}}">Quản lý loại tin tức</a>
        <a href="{{route('them_loai_tin_tuc',1)}}"><span class="bi bi-collection-fill"></span></a>
      </li>
      <li class="nav-item p-1">
        <a class="nav-link" href="{{route('quan_ly_san_pham',1)}}">Quản lý sản phẩm</a>
        <a href="{{route('quan_ly_san_pham',1)}}"><span class="bi bi-box-fill"></span></a>
      </li>
      <li class="nav-item p-1">
        <a class="nav-link" href="{{route('quan_ly_tin_tuc',1)}}">Quản lý tin tức</a>
        <a href="{{route('quan_ly_tin_tuc',1)}}"><span class="bi bi-newspaper"></span></a>
      </li>
    </ul>
  </div>