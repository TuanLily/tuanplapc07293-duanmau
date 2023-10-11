<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title" style="text-align:center; background-color:aquamarine; color:red">
                <h2>QUÝ KHÁCH ĐÃ ĐẶT HÀNG THÀNH CÔNG!</h2>
            </div>
            <?php
            if (isset($bill) && (is_array($bill))) {
                extract($bill);
            }
            ?>
        </div>

        <div class="row_main mb">
            <div class="box-title">THÔNG TIN ĐƠN HÀNG</div>
            <div class="row_main box-content" style="text-align:center;">
                <li>Mã đơn hàng: MDH-
                    <?= $bill['id'] ?>
                </li>
                <li>Ngày đặt hàng:
                    <?= $bill['ngaydathang'] ?>
                </li>
                <li>Tổng đơn hàng: $
                    <?= number_format($bill['total'], 0, ',', '.') ?>
                </li>
                <li>Phương thức thanh toán:
                    <?= $bill['bill_pttt'] ?>
                </li>
            </div>

        </div>

        <div class="row_main mb">
            <div class="box-title">THÔNG TIN KHÁCH HÀNG</div>
            <div class="row_main box-content form_tai_khoan">
                <table>
                    <tr>
                        <td>Người đặt hàng:</td>
                        <td>
                            <?= $bill['bill_name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td>
                            <?= $bill['bill_address'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <?= $bill['bill_email'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Điện thoại:</td>
                        <td>
                            <?= $bill['bill_tel'] ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="row_main mb">
            <div class="box-title">CHI TIẾT ĐƠN HÀNG</div>
            <div class="row_main box-content cart">
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                    <?php
                    bill_chi_tiet($billct);
                    ?>


                </table>
            </div>
        </div>
        <div class="row_main mb">
            <a href="index.php?act=mybill"><input type="submit" value="Xem Đơn Hàng"></a>
        </div>
    </div>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>