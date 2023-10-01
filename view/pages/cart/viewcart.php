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
                    <!-- <tr>
                        <td>1</td>
                        <td><img src="view/images/6e11af3517edff2ff1aeca18a5a8b9d5.jpg" alt="" height="80px"></td>
                        <td>Tivi</td>
                        <td>100000</td>
                        <td>2</td>
                        <td>200000</td>
                        <td><input type="button" value="Sửa"></td>
                    </tr> -->

                </table>
            </div>
        </div>
        <div class="row_main mb">
            <a href="index.php">
                <input type="button" value="Trở Về">
            </a>
            <a href="index.php?act=bill"><input type="button" value="Đặt hàng"></a>
            <a href="index.php?act=delcart">
                <input type="button" value="Xóa Giỏ Hàng">
            </a>

        </div>
    </div>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>