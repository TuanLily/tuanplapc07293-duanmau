<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- bootstrap 5.3  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- css  -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container">
        <!-- Header  -->
        <div class="row_main mb headerAdmin">
            <h1>QUẢN TRỊ WEBSITE</h1>
        </div>

        <!-- Navbar  -->
        <div class="row_main mb">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">X-Shop</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/admin/admin.php">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Danh Mục</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Hàng Hóa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Khách Hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bình Luận</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Thống kê</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row_main">
            <div class="row_main frontiltle">
                <h1>QUẢN LÝ HÀNG HÓA</h1>
            </div>
            <div class="row_main form_content">
                <div class="row_main mb10 form_dsloai">
                    <table>
                        <tr>
                            <th></th>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI</th>
                            <th>CHỨC NĂNG</th>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>001</td>
                            <td>Đồng hồ</td>
                            <td>
                                <input type="button" value="Sửa">
                                <input type="button" value="Xóa">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>001</td>
                            <td>Đồng hồ</td>
                            <td>
                                <input type="button" value="Sửa">
                                <input type="button" value="Xóa">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>001</td>
                            <td>Đồng hồ</td>
                            <td>
                                <input type="button" value="Sửa">
                                <input type="button" value="Xóa">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>001</td>
                            <td>Đồng hồ</td>
                            <td>
                                <input type="button" value="Sửa">
                                <input type="button" value="Xóa">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>001</td>
                            <td>Đồng hồ</td>
                            <td>
                                <input type="button" value="Sửa">
                                <input type="button" value="Xóa">
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="row_main mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa mục đã chọn">
                    <a href="../admin.php"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>