<?php
global $connect;
$list_bill = mysqli_query($connect, "SELECT * FROM bill");


//Tổng các bảng ghi
$total = mysqli_num_rows($list_bill);

//Giới hạn hiển thị
$limit = 10;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;


$listbill_limit = getBill_limit($start, $limit);

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $listbill = $listbill_limit;
}
?>

<div class="row_main">
    <div class="row_main frontiltle mb">
        <h1>QUẢN LÝ ĐƠN HÀNG</h1>
    </div>

    <form action="index.php?act=delete_list_bill" method="post">
        <input type="text" name="keyw" placeholder="Nhập mã đơn hàng">
        <input type="submit" name="listcheck" value="CHỌN">

        <div class="row_main form_content">
            <div class="row_main mb10 form_dsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>MÃ Khách Hàng</th>
                        <th>THÔNG TIN KHÁCH HÀNG</th>
                        <th>SỐ LƯỢNG HÀNG</th>
                        <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                        <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                        <th>NGÀY ĐẶT HÀNG</th>
                        <th>CHỨC NĂNG</th>
                    </tr>
                    <?php
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $infor_kh = '
                                        ' . $bill["bill_name"] . '
                                    <br>' . $bill["bill_email"] . '
                                    <br>' . $bill["bill_address"] . '
                                    <br>' . $bill["bill_tel"];
                        $countsp = loadall_cart_count($bill['id']);
                        $ttdh = get_ttdh($bill['bill_status']);
                        $xoabill = "index.php?act=xoabill&id=" . $id;
                        echo '
                        <tr>
                            <td> <input type="checkbox" class="checkbox" name="check_del[]" value="' . $bill['id'] . '"></td>
                            <td>MDH-' . $bill['id'] . '</td>
                            <td>KH-' . $bill['iduser'] . '</td>
                            <td>' . $infor_kh . '</td>
                            <td>' . $countsp . '</td>
                            <td><strong>$' . number_format($bill['total'], 0, ',', '.') . '</strong></td>
                            <td>' . $ttdh . '</td>
                            <td>' . $bill['ngaydathang'] . '</td>
                            <td>
                                <a href=""><input type="button" value="Sửa"></a>
                                <a href="' . $xoabill . '" onclick="return confirm(`Bạn có chắc muốn xóa không?`)" class="btn btn-danger">Xóa</a>
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
                            <a class="page-link" href="index.php?act=listbill&page=<?= $cr_page - 1 ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <!-- <span class="sr-only">&raquo;</span> -->
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++): ?>
                            <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>"><a class="page-link"
                                    href="index.php?act=listbill&page=<?= $i ?>">
                                    <?= $i ?>
                                </a></li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo (($cr_page == $total_page) ? 'check' : '') ?>">
                            <a class="page-link" href="index.php?act=listbill&page=<?= $cr_page + 1 ?>"
                                aria-label="Next">
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
                    <a href="index.php?act=delete_list_bill"><input type="submit" value="Xóa mục đã chọn"
                            name="delete"></a>
                </div>
            </div>
        </div>
    </form>
</div>