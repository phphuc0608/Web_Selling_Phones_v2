<!DOCTYPE html>
<html>
<head>
    @include('module/head')
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <div class="container-fluid px-0">
        @include('module/sidebar')
        <form>
            <div id="main" class="row no-gutters p-3">
                @include('module/header')
                @include('module/form_quan_ly_san_pham/form_quan_ly_san_pham')
                @include('module/table/table_san_pham')
            </div>
        </form>
    </div>
    @include('module/footer')
</body>
</html>