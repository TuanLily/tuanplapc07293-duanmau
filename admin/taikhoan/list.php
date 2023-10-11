<?php
global $connect;
$listtaikhoan = mysqli_query($connect, "SELECT * FROM taikhoan");


//Tổng các bảng ghi
$total = mysqli_num_rows($listtaikhoan);

//Giới hạn hiển thị
$limit = 5;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;


$listtaikhoan_limit = getTaiKhoan_limit($start, $limit);

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $listtaikhoan = $listtaikhoan_limit;
}
?>

<div class="row_main">
    <div class="row_main frontiltle">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <form action="index.php?act=delete_list_taikhoan" method="post">

        <div class="row_main form_content">
            <div class="row_main mb10 form_dsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ TÀI KHOẢN</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th>
                        <th>CHỨC NĂNG</th>
                    </tr>
                    <?php
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        $suatk = "index.php?act=suatk&id=" . $id;
                        $xoatk = "index.php?act=xoatk&id=" . $id;
                        echo '
                    <tr>
                        <td> <input type="checkbox" class="checkbox" name="check_del[]" value="' . $id . '"></td>
                        <td>' . $id . '</td>
                        <td>' . $user . '</td>
                        <td><p class="card-text" style="width:100px;">' . $pass . '</p></td>
                        <td>' . $email . '</td>
                        <td>' . $address . '</td>
                        <td>' . $tel . '</td>
                        <td>' . $role . '</td>
                        <td>
                            <a href="' . $suatk . '"><input type="button" value="Sửa")"></a>
                            <a href="' . $xoatk . '" onclick="return confirm(`Bạn có chắc muốn xóa không?`)" class="btn btn-danger">Xóa</a>
                            </td>
                    </tr>
                ';
                    }
                    ?>


                </table>
            </div>

            <!-- Phân trang -->
            <div class="box">
                <div class="first_line"></div>
                <p>Trang</p>
                <div class="second_line"></div>
            </div>
            <div class="pag">
                <nav aria-label="Page navigation example" class="pag">
                    <ul class="pagination">
                        <li class="page-item <?php echo (($cr_page - 1 == 0) ? 'check' : '') ?>">
                            <a class="page-link" href="index.php?act=dskh&page=<?= $cr_page - 1 ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <!-- <span class="sr-only">&raquo;</span> -->
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++): ?>
                            <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>"><a class="page-link"
                                    href="index.php?act=dskh&page=<?= $i ?>">
                                    <?= $i ?>
                                </a></li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo (($cr_page == $total_page) ? 'check' : '') ?>">
                            <a class="page-link" href="index.php?act=dskh&page=<?= $cr_page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <!-- <span class="sr-only">Next</span> -->
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row_main mb10">
                <div class="">
                    <label for="checkAll" class="btn btn-secondary chon" style="display:block;">Chọn tất cả</label>
                    <label for="checkAll" class="btn btn-warning bochon" style="display:none;">Bỏ chọn</label>
                    <input type="checkbox" hidden id="checkAll">
                    <a href="index.php?act=delete_list_taikhoan"><input type="submit" value="Xóa mục đã chọn"
                            name="delete"></a>
                </div>
            </div>
        </div>
    </form>
</div>