<div class="col-md-12 overflow-auto">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th class="text-right" style="width: 75px;min-width: 75px"><i class="bi bi-key-fill"></i> Mã</th>
        <th class="text-center"><i class="bi bi-image"></i></th>
        <th style="min-width: 250px">Tên loại sản phẩm</th>
        <th class="text-center" style="width: 120px;min-width: 120px">Trạng thái</th>
        <th class="text-center" style="width: 120px;min-width: 120px">Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($loai_san_phams as $loai_san_pham)
        <tr>
            <td class="text-center">{{$loai_san_pham->ma_loai_san_pham}}</td>
            <td class="text-center py-4"><img style="width: 100px; height: 100px;" src="{{asset('loai_san_pham/'.$loai_san_pham->hinh_anh)}}" alt=""></td>
            <td class="align-items-center">{{$loai_san_pham->ten_loai_san_pham}}</td>
            <td class="text-center"><input type="checkbox"{{$loai_san_pham->trang_thai == 1?'checked':''}}></td>
            <td class="text-center">
                <a href="{{route('sua_loai_san_pham',['ma_loai_san_pham'=>$loai_san_pham->ma_loai_san_pham])}}">Sửa</a> |
                <a href="{{route('xoa_loai_san_pham',['ma_loai_san_pham'=>$loai_san_pham->ma_loai_san_pham])}}">Xóa</a>
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
            <a class="previous page-link" href="{{route('them_loai_san_pham',['page'=>($page-1)])}}">&lt;</a>
        @endif
      </li>
        @for($i = 1; $i <= $page_number; ++$i)
          <li class="page-item">
            <a class="page-link" href="{{route('them_loai_san_pham',['page'=>$i])}}">{{$i}}</a>  
          </li>
        @endfor
      <li class="page-item">
        @if($page < $page_number)
          <a class="next page-link" href="{{route('them_loai_san_pham',['page'=>($page+1)])}}">&gt;</a>
        @endif
      </li>
    </ul>
  </div>
</div>