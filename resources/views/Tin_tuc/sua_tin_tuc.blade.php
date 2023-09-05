<!DOCTYPE html>
<html>
<head>
    @include('module/head')
    <title>Sửa tin tức</title>
</head>
<body>
    <div class="container-fluid px-0">
        @include('module/sidebar')
        <form onsubmit="return check_form();" action="{{url('sua_tin_tuc')}}" method="post" enctype="multipart/form-data">
            <div id="main" class="row no-gutters p-3">
                @include('module/header')
                @include('module/form_quan_ly_tin_tuc/form_sua_tin_tuc')
                @include('module/table/table_tin_tuc')
            </div>
        </form>
    </div>
    @include('module/footer')
</body>
</html>