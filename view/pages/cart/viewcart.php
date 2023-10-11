<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title">Giỏ hàng</div>
            <div class="row_main box-content cart">
                <table>

                    <tr>
                        <th>Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành Tiền</th>
                        <th>Thao tác</th>
                    </tr>

                    <?php
                    viewcart();
                    ?>


                </table>
            </div>
        </div>
        <div class="row_main mb">
            <a href="index.php">
                <input type="button" value="Trở Về">
            </a>
            <a href="index.php?act=bill"><input type="button" value="Đặt hàng" name="dathang"></a>
            <a href="index.php?act=delcart">
                <input type="button" value="Xóa Giỏ Hàng">
            </a>

        </div>
    </div>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>