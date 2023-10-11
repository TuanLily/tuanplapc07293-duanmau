<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title">Cập nhật tài khoản</div>
            <div class="row_main box-content form_tai_khoan">
                <?php
                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                ?>
                <form action="index.php?act=edit_taikhoan" method="post">
                    <div class="row_main mb10">
                        Tên Tài Khoản: <br>
                        <input type="text" name="user" value="<?= $user ?>">
                    </div>
                    <div class="row_main mb10">
                        Họ Và Tên: <br>
                        <input type="text" name="name" value="<?= $name ?>">
                    </div>
                    <div class="row_main mb10">
                        Email: <br>
                        <input type="email" name="email" value="<?= $email ?>">
                    </div>
                    <div class="row_main mb10">
                        Mật khẩu: <br>
                        <input type="text" name="pass" value="<?= $pass ?>" readonly>
                    </div>
                    <div class="row_main mb10">
                        Địa chỉ: <br>
                        <input type="text" name="address" value="<?= $address ?>">
                    </div>
                    <div class="row_main mb10">
                        Số điện thoại: <br>
                        <input type="text" name="tel" value="<?= $tel ?>">
                        <div class="thongbao">
                            <span>
                                <?php echo (isset($_SESSION['error']['tel'])) ? $_SESSION['error']['tel'] : '' ?>
                            </span>
                        </div>
                    </div>

                    <div class="row_main mb10">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="submit" value="Cập nhật" name="capnhat">
                        <input type="reset" value="Nhập lại">
                    </div>

                </form>

                <h5 class="thongbao">
                    <?php

                    if (isset($tb) && ($tb != "")) {
                        echo $tb;
                    }

                    ?>
                </h5>
            </div>
        </div>
    </div>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>