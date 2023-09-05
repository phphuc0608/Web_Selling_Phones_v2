<div class="col-md-12 overflow-auto">
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <th class="text-center" style="width: 75px;min-width: 75px"><i class="bi bi-key-fill"></i> Mã</th>
              <th class="text-center"><i class="bi bi-image"></i></th>
              <th style="min-width: 250px">Tên nhà sản xuất</th>
              <th class="text-center" style="width: 120px;min-width: 120px">Trạng thái</th>
              <th class="text-center" style="width: 120px;min-width: 120px">Hành động</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($nha_san_xuats as $nha_san_xuat)
          <tr>
              <td class="text-center">{{$nha_san_xuat->ma_nha_san_xuat}}</td>
              <td class="text-center py-4"><img style="width: 100px; height: 100px;" src="{{asset('nha_san_xuat/'.$nha_san_xuat->hinh_anh)}}" alt=""></td>
              <td class="align-items-center">{{$nha_san_xuat->ten_nha_san_xuat}}</td>
              <td class="text-center"><input type="checkbox"{{$nha_san_xuat->trang_thai == 1?'checked':''}}></td>
              <td class="text-center">
                  <a href="{{route('sua_nha_san_xuat',['ma_nha_san_xuat'=>$nha_san_xuat->ma_nha_san_xuat])}}">Sửa</a> |
                  <a href="{{route('xoa_nha_san_xuat',['ma_nha_san_xuat'=>$nha_san_xuat->ma_nha_san_xuat])}}">Xóa</a>
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
            <a class="previous page-link" href="{{route('them_nha_san_xuat',['page'=>($page-1)])}}">&lt;</a>
        @endif
      </li>
        @for($i = 1; $i <= $page_number; ++$i)
          <li class="page-item">
            <a class="page-link" href="{{route('them_nha_san_xuat',['page'=>$i])}}">{{$i}}</a>  
          </li>
        @endfor
      <li class="page-item">
        @if($page < $page_number)
          <a class="next page-link" href="{{route('them_nha_san_xuat',['page'=>($page+1)])}}">&gt;</a>
        @endif
      </li>
    </ul>
  </div>
</div>