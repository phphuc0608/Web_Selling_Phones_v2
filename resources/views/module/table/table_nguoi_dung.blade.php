<div class="col-md-12 overflow-auto">
  <table class="table table-striped table-bordered">
    <thead>
			<tr>
				<th style="min-width: 325px">Tên tài khoản</th>
				<th style="min-width: 120px; width: 120px; text-align: center;">Trạng thái</th>
				<th style="min-width: 120px; width: 120px; text-align: center;">Hành động</th>
			</tr>
		</thead>
    <tbody>
      @foreach ($nguoi_dungs as $nguoi_dung)
        <tr>
            <td class="align-items-center">{{$nguoi_dung->tai_khoan}}</td>
            <td class="text-center"><input type="checkbox"{{$nguoi_dung->trang_thai == 1?'checked':''}}></td>
            <td class="text-center">
                <a href="{{route('sua_nguoi_dung',['tai_khoan'=>$nguoi_dung->tai_khoan])}}">Sửa</a> |
                <a href="{{route('xoa_nguoi_dung',['tai_khoan'=>$nguoi_dung->tai_khoan])}}">Xóa</a>
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
            <a class="previous page-link" href="{{route('them_nguoi_dung',['page'=>($page-1)])}}">&lt;</a>
        @endif
      </li>
        @for($i = 1; $i <= $page_number; ++$i)
          <li class="page-item">
            <a class="page-link" href="{{route('them_nguoi_dung',['page'=>$i])}}">{{$i}}</a>  
          </li>
        @endfor
      <li class="page-item">
        @if($page < $page_number)
          <a class="next page-link" href="{{route('them_nguoi_dung',['page'=>($page+1)])}}">&gt;</a>
        @endif
      </li>
    </ul>
  </div>
</div>