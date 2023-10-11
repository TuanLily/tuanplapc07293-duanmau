<?php
global $connect;
$listsp = mysqli_query($connect, "SELECT * FROM danhmuc");


//Tổng các bảng ghi
$total = mysqli_num_rows($listsp);

//Giới hạn hiển thị
$limit = 3;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;


$listsp_limit = getProduct_limit($start, $limit);

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $listsanpham = $listsp_limit;
}
?>

<div class="row_main">
    <div class="row_main frontiltle mb">
        <h1>QUẢN LÝ HÀNG HÓA</h1>
    </div>

    <form action="index.php?act=delete_list_sp" method="post">
        <input type="text" name="keyw">

        <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="listcheck" value="CHỌN">
        <div class="row_main form_content">
            <div class="row_main mb10 form_dsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>HÌNH</th>
                        <th>GIÁ</th>
                        <th>LƯỢT XEM</th>
                        <th>CHỨC NĂNG</th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $hinhpath = '../upload/' . $img;
                        if (is_file($hinhpath)) {
                            $hinhanh = "<img src='" . $hinhpath . "' height='80'>";
                        } else {
                            $hinhanh = "Không có hình ảnh";
                        }
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        echo '
                        <tr>
                    <td> <input type="checkbox" class="checkbox" name="check_del[]" value="' . $id . '"></td>
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $hinhanh . '</td>
                    <td>$' . number_format($price, 0, ',', '.') . '</td>
                    <td>' . $luotxem . '</td>
                    <td>
                        <a href="' . $suasp . '"><input type="button" value="Sửa"></a>
                        <a href="' . $xoasp . '" onclick="return confirm(`Bạn có chắc muốn xóa không?`)" class="btn btn-danger">Xóa</a>
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
                            <a class="page-link" href="index.php?act=listsp&page=<?= $cr_page - 1 ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <!-- <span class="sr-only">Previous</span> -->
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++): ?>
                        <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>"><a class="page-link"
                                href="index.php?act=listsp&page=<?= $i ?>">
                                <?= $i ?>
                            </a></li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo (($cr_page == $total_page) ? 'check' : '') ?>">
                            <a class="page-link" href="index.php?act=listsp&page=<?= $cr_page + 1 ?>" aria-label="Next">
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
                    <a href="index.php?act=delete_list_sp"><input type="submit" value="Xóa mục đã chọn"
                            name="delete"></a>
                    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                </div>

            </div>
        </div>
    </form>

</div>