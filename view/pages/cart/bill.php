<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <form action="index.php?act=billconfirm" method="post">
                <div class="box-title">THÔNG TIN KHÁCH HÀNG</div>
                <div class="row_main box-content form_tai_khoan">
                    <?php
                    if(isset($_SESSION['user'])){
                        $name = $_SESSION['user']['name'];
                        $address = $_SESSION['user']['address'];
                        $email = $_SESSION['user']['email'];
                        $tel = $_SESSION['user']['tel'];
                    }else{
                        $name = "";
                        $address = "";
                        $email = "";
                        $tel = "";
                    }
                ?>
                    <div class="row_main mb10">
                        Họ và tên: <br>
                        <input type="text" name="name" value="<?=$name?>">
                    </div>
                    <div class="row_main mb10">
                        Địa chỉ: <br>
                        <input type="text" name="address" value="<?=$address?>">
                    </div>
                    <div class="row_main mb10">
                        Email: <br>
                        <input type="text" name="email" value="<?=$email?>">
                    </div>
                    <div class="row_main mb10">
                        Số điện thoại: <br>
                        <input type="text" name="tel" value="<?=$tel?>">
                    </div>

                </div>
        </div>
        <div class="row_main mb">
            <div class="box-title">PHƯƠNG THỨC THANH TOÁN</div>
            <div class="row_main box-content">
                <table>

                    <tr>
                        <td><input type="radio" name="pttt" value="1" checked>Trả tiền khi đặt hàng</td>
                        <td><input type="radio" name="pttt" value="2">Chuyển khoản ngân hàng</td>
                        <td><input type="radio" name="pttt" value="3">Thanh toán onine</td>

                    </tr>

                </table>
            </div>
        </div>

        <div class="row_main mb">
            <div class="box-title">THÔNG TIN ĐƠN HÀNG</div>
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
                    bill();
                    ?>


                </table>
            </div>
        </div>
        <div class="row_main mb">
            <input type="submit" value="Đặt hàng" name="dongydathang">
        </div>
    </div>
    </form>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>