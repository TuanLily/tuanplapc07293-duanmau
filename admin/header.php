<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin/X-Shop</title>

    <link rel="icon" href="../view/images/logo.png" type="image/x-icon">

    <!-- bootstrap 5.3  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    <!-- css  -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/loader.css">
    <!-- Ck editer  -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
</head>

<body>
    <div class="loader">
        <div></div>
    </div>
    <div class="container">
        <!-- Header  -->
        <div class="row_main mb headerAdmin">
            <h1>QUẢN TRỊ WEBSITE</h1>
        </div>
        <!-- Navbar  -->
        <div class="row_main mb">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php?page=1">X-Shop</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php?act=bieudo">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?act=listdm&page=1">Danh Mục</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?act=listsp&page=1">Sản Phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?act=dskh&page=1">Khách Hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?act=dsbl&page=1">Bình Luận</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?act=listbill&page=1">Đơn Hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?act=thongke">Thống kê</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>