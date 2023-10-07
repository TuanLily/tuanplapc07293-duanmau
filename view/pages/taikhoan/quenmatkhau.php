<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title">Quên mật khẩu</div>
            <div class="row_main box-content form_tai_khoan">
                <form action="index.php?act=quenmk" method="post">

                    <div class="row_main mb10">
                        Email: <br>
                        <input type="email" name="email" placeholder="Nhập lại email bạn đã dùng để đăng ký tài khoản">
                    </div>

                    <div class="row_main mb10">
                        <input type="submit" value="Xác nhận" name="goiemail">
                        <a class="nutnhan" href="index.php?act=dangnhap">Đăng Nhập</a>
                    </div>

                </form>

                <h4 class="thongbao">
                    <?php
                
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }

                    ?>
                </h4>
            </div>
        </div>
    </div>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>