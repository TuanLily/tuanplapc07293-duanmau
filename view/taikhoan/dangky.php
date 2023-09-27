<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title">Đăng ký thành viên</div>
            <div class="row_main box-content form_tai_khoan">
                <form action="index.php?act=dangky" method="post">
                    <div class="row_main mb10">
                        Tên Tài Khoản: <br>
                        <input type="text" name="user" required>
                    </div>
                    <div class="row_main mb10">
                        Email: <br>
                        <input type="email" name="email" required>
                    </div>
                    <div class="row_main mb10">
                        Mật khẩu: <br>
                        <input type="password" name="pass" required>
                    </div>
                    <!-- <div class="row_main mb10">
                        Xác nhận mật khẩu: <br>
                        <input type="password" name="pass">
                    </div> -->
                    <div class="row_main mb10">
                        <input type="submit" value="Đăng ký" name="dangky">
                        <input type="reset" value="Nhập lại">
                    </div>

                </form>

                <h3 class="thongbao">
                    <?php
                
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }

                    ?>
                </h3>
            </div>
        </div>
    </div>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>