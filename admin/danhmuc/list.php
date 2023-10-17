<?php
global $connect;
$listdm = mysqli_query($connect, "SELECT * FROM danhmuc");


//Tổng các bảng ghi
$total = mysqli_num_rows($listdm);

//Giới hạn hiển thị
$limit = 3;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;


$listdm_limit = getDanhMuc_limit($start, $limit);

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $listdanhmuc = $listdm_limit;
}
?>

<div class="row_main">
    <div class="row_main frontiltle">
        <h1>QUẢN LÝ DANH MỤC</h1>
    </div>
    <form action="index.php?act=delete_list_dm" method="post">

        <div class=" row_main form_content">
            <div class="row_main mb10 form_dsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>CHỨC NĂNG</th>
                    </tr>
                    <?php
                    echo '<form>';
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $suadm = "index.php?act=suadm&id=" . $id;
                        $xoadm = "index.php?act=xoadm&id=" . $id;
                        echo '
                    <tr>
                        <td> <input type="checkbox" class="checkbox" name="check_del[]" value="' . $id . '"></td>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>
                            <a href="' . $suadm . '"><input type="button" value="Sửa"></a>
                            <a href="' . $xoadm . '" onclick="return confirm(`Bạn có chắc muốn xóa không?`)" class="btn btn-danger">Xóa</a>
                            </td>
                    </tr>
                    ';
                    }
                    echo '</form>';
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
                            <a class="page-link" href="index.php?act=listdm&page=<?= $cr_page - 1 ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <!-- <span class="sr-only">&raquo;</span> -->
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++): ?>
                            <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>"><a class="page-link"
                                    href="index.php?act=listdm&page=<?= $i ?>">
                                    <?= $i ?>
                                </a></li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo (($cr_page == $total_page) ? 'check' : '') ?>">
                            <a class="page-link" href="index.php?act=listdm&page=<?= $cr_page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <!-- <span class="sr-only">Next</span> -->
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row_main mb10">
                <label for="checkAll" class="btn btn-secondary chon">Chọn tất cả</label>
                <label for="checkAll" class="btn btn-warning bochon" style="display: none;">Bỏ chọn</label>
                <input type="checkbox" hidden id="checkAll">
                <a href="index.php?act=delete_list_taikhoan"><input type="submit" value="Xóa mục đã chọn"
                        name="delete"></a>
                <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
            </div>
        </div>
    </form>

</div>