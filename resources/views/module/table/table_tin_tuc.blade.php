<div class="col-md-12 overflow-auto">
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <th class="text-center" style="width: 75px;min-width: 75px"><i class="bi bi-key-fill"></i> Mã</th>
              <th class="text-center"><i class="bi bi-image"></i></th>
              <th style="min-width: 250px">Tiêu đề tin tức</th>
              <th class="text-center" style="width: 200px;min-width: 120px">Loại tin tức</th>
              <th class="text-center" style="width: 120px;min-width: 120px">Ngày đăng</th>
              <th class="text-center" style="width: 120px;min-width: 120px">Trạng thái</th>
              <th class="text-center" style="width: 120px;min-width: 120px">Hành động</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($tin_tucs as $tin_tuc)
          <tr>
              <td class="text-center">{{$tin_tuc->ma_tin_tuc}}</td>
              <td class="text-center py-4"><img style="width: 100px; height: 100px;" src="{{asset('tin_tuc/'.$tin_tuc->hinh_anh)}}" alt=""></td>
              <td class="align-items-center">{{$tin_tuc->tieu_de}}</td>
              <td class="align-items-center">{{$tin_tuc->loai_tin_tuc->ten_loai_tin_tuc}}</td>
              <td class="align-items-center">{{$tin_tuc->ngay_dang}}</td>
              <td class="text-center"><input type="checkbox"{{$tin_tuc->trang_thai == 1?'checked':''}}></td>
              <td class="text-center">
                  <a href="{{route('sua_tin_tuc',['ma_tin_tuc'=>$tin_tuc->ma_tin_tuc])}}">Sửa</a> |
                  <a href="{{route('xoa_tin_tuc',['ma_tin_tuc'=>$tin_tuc->ma_tin_tuc])}}">Xóa</a>
              </td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>
<div class="col-md-12">
  <div class="pagination d-flex justify-content-center">
    <ul class="pagination">
      <li class="page-item">
        @if($page > 1)
            <a class="previous page-link" href="{{route('quan_ly_tin_tuc',['page'=>($page-1)])}}">&lt;</a>
        @endif
      </li>
        @for($i = 1; $i <= $page_number; ++$i)
          <li class="page-item">
            <a class="page-link" href="{{route('quan_ly_tin_tuc',['page'=>$i])}}">{{$i}}</a>  
          </li>
        @endfor
      <li class="page-item">
        @if($page < $page_number)
          <a class="next page-link" href="{{route('quan_ly_tin_tuc',['page'=>($page+1)])}}">&gt;</a>
        @endif
      </li>
    </ul>
  </div>
</div>