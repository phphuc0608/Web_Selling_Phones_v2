<!DOCTYPE html>
<html>
<head>
    @include('module/head')
    <title>Thêm sản phẩm</title>
</head>
<body>
    <div class="container-fluid px-0">
        @include('module/sidebar')
        <form onsubmit="return check_form();" action="{{url('them_san_pham')}}" method="post" enctype="multipart/form-data">
            <div id="main" class="row no-gutters p-3">
                @include('module/header')
                @include('module/form_quan_ly_san_pham/form_them_san_pham')
            </div>
        </form>
    </div>
    @include('module/footer')
</body>
</html>