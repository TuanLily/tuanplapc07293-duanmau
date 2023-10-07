<div class="row_main">
    <div class="row_main frontiltle mb">
        <h1>QUẢN LÝ ĐƠN HÀNG</h1>
    </div>

    <form action="index.php?act=listbill" method="post">
        <input type="text" name="keyw" placeholder="Nhập mã đơn hàng">
        <input type="submit" name="listcheck" value="CHỌN">
    </form>
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
                            <td><input type="checkbox" name="" id=""></td>
                            <td>MDH-' . $bill['id'] . '</td>
                            <td>KH-' . $bill['iduser'] . '</td>
                            <td>' . $infor_kh . '</td>
                            <td>' . $countsp . '</td>
                            <td><strong>$' . number_format($bill['total'], 0, ',', '.') . '</strong></td>
                            <td>' . $ttdh . '</td>
                            <td>' . $bill['ngaydathang'] . '</td>
                            <td>
                                <a href=""><input type="button" value="Sửa"></a>
                                <a href="' . $xoabill . '"><input type="button" value="Xóa" onClick="return confirm("Bạn có chắc muốn xóa không?")"></a>
                            </td>
                        </tr>
                        ';
                }
                ?>



            </table>
        </div>
        <div class="row_main mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa mục đã chọn">
        </div>
    </div>
</div>