<?php
global $connect;
$list_bl = mysqli_query($connect, "SELECT * FROM binhluan");


//Tổng các bảng ghi
$total = mysqli_num_rows($list_bl);

//Giới hạn hiển thị
$limit = 10;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;


$listbl_limit = getBinhLuan_limit($start, $limit);

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $listbinhluan = $listbl_limit;
}
?>

<div class="row_main">
    <div class="row_main frontiltle">
        <h1>QUẢN LÝ BÌNH LUẬN</h1>
    </div>
    <form action="index.php?act=delete_list_bl" method="post">

        <div class="row_main form_content">
            <div class="row_main mb10 form_dsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>Mã</th>
                        <th>Nội dung bình luận</th>
                        <th>Mã khách hàng</th>
                        <th>Mã sản phẩm</th>
                        <th>Ngày bình luận</th>
                        <th>Chức năng</th>
                    </tr>
                    <?php
                    foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $suabl = "index.php?act=suabl&id=" . $id;
                        $xoabl = "index.php?act=xoabl&id=" . $id;
                        echo '
                    <tr>
                        <td> <input type="checkbox" class="checkbox" name="check_del[]" value="' . $id . '"></td>
                        <td>' . $id . '</td>
                        <td>' . $noidung . '</td>
                        <td>' . $iduser . '</td>
                        <td>' . $idpro . '</td>
                        <td>' . $ngaybinhluan . '</td>
                        <td>
                            <a href="' . $suabl . '"><input type="button" value="Sửa")"></a>
                            <a href="' . $xoabl . '" onclick="return confirm(`Bạn có chắc muốn xóa không?`)" class="btn btn-danger">Xóa</a>
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
                            <a class="page-link" href="index.php?act=dsbl&page=<?= $cr_page - 1 ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <!-- <span class="sr-only">&raquo;</span> -->
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++): ?>
                        <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>"><a class="page-link"
                                href="index.php?act=dsbl&page=<?= $i ?>">
                                <?= $i ?>
                            </a></li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo (($cr_page == $total_page) ? 'check' : '') ?>">
                            <a class="page-link" href="index.php?act=dsbl&page=<?= $cr_page + 1 ?>" aria-label="Next">
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
                    <a href="index.php?act=delete_list_bl"><input type="submit" value="Xóa mục đã chọn"
                            name="delete"></a>
                </div>
            </div>
        </div>
    </form>
</div>