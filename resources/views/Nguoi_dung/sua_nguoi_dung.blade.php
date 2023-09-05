<!DOCTYPE html>
<html>
<head>
    @include('module/head')
    <title>Sửa người dùng</title>
</head>
<body>
    <div class="container-fluid px-0">
        @include('module/sidebar')
        <form onsubmit="return check_form();" action="{{url('sua_nguoi_dung')}}" method="post">
            <div id="main" class="row no-gutters p-3">
                @include('module/header')
                @include('module/form_quan_ly_nguoi_dung/form_sua_nguoi_dung')
                @include('module/table/table_nguoi_dung')
            </div>
        </form>
    </div>
    @include('module/footer')
</body>
</html>