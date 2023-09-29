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
                    $tong = 0;
                    foreach ($_SESSION['mycart'] as $cart) {
                        $hinh = $img_path.$cart[2];
                        $thanhtien = $cart[3]*$cart[4];
                        $gia = $cart[3];
                        $tong += $thanhtien;
                        echo '
                           <tr> 
                            <td><img src="'.$hinh.'" alt="" height="80px"></td>
                            <td>'.$cart[1].'</td>
                            <td>$'.number_format($gia,0,",",".").'</td>
                            <td>'.$cart[4].'</td>
                            <td>$'.number_format($thanhtien,0,",",".").'</td>
                            <td>
                                <a href=""><input type="button" value="Sửa" style="margin-bottom:5px;")"></a>
                                <a href=""><input type="button" value="Xóa")"></a>
                            </td>
                            
                           </tr> 
                        ';
                    }
                    echo '
                    <td colspan="5">Tổng đơn hàng</td>
                    
                    <td>$'.number_format($tong,0,",",".").'</td>

                ';
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
            <input type="submit" value="Đặt hàng">
            <a href="index.php?act=delcart">
                <input type="button" value="Xóa Giỏ Hàng">
            </a>

        </div>
    </div>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>