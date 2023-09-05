<!DOCTYPE html>
<html>
<head>
    @include('module/head')
    <title>Sửa nhà sản xuất</title>
</head>
<body>
    <div class="container-fluid px-0">
        @include('module/sidebar')
        <form onsubmit="return check_form();" action="{{url('sua_nha_san_xuat')}}" method="post" enctype="multipart/form-data">
            <div id="main" class="row no-gutters p-3">
                @include('module/header')
                @include('module/form_quan_ly_nha_san_xuat/form_sua_nha_san_xuat')
                @include('module/table/table_nha_san_xuat')
            </div>
        </form>
    </div>
    @include('module/footer')
</body>
</html>