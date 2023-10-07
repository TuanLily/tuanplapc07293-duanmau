<div class="row_main mb">
    <div class="box-title">Tài Khoản</div>
    <div class="box-content form_tai_khoan">
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);
            ?>
        <div class="row_main mb10">
            Tài khoản: <strong style="font-size:18px;">
                <?= $user ?>
            </strong>
        </div>
        <div class="row_main mb10">
            <?php if ($role == 1) { ?>
            <li>
                <a href="admin/index.php" style="color:red;">Đăng nhập admin</a>
            </li>
            <?php } ?>
            <li>
                <a href="index.php?act=viewcart">Giỏ hàng</a>
            </li>
            <li>
                <a href="index.php?act=mybill">Đơn hàng của tôi</a>
            </li>
            <li>
                <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
            </li>
            <li>
                <a href="index.php?act=thoat">Đăng xuất</a>
            </li>
        </div>
        <?php
        } else {
            ?>
        <form action=" index.php?act=dangnhap" method="post">
            <div class="row_main mb10">
                Tên đăng nhập <br>
                <input type="text" name="user" id="">
            </div>
            <div class="row_main mb10">
                Mật khẩu <br>
                <input type="password" name="pass" id="password_aside">
                <div id="toggle_pass_aside" onclick="showPasswordAside()" style="right:22.5%;"></div>
            </div>
            <div class="row_main mb10">
                <input type="checkbox" name="" id=""> Ghi nhớ tài khoản?
            </div>
            <div class="row_main mb10">
                <input type="submit" value="Đăng nhập" name="dangnhap">
            </div>
        </form>
        <h6 class="thongbao">
            <?php

                if (isset($tb) && ($tb != "")) {
                    echo $tb;
                }

                ?>
        </h6>
        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
        <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
        <?php } ?>
    </div>
</div>

<div class="row_main mb">
    <div class="box-title">Danh mục</div>
    <div class="box-content2 menu_doc">
        <ul>
            <?php
            $i = 0;
            foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=" . $id;
                echo '
                        <li>
                            <a href="' . $linkdm . '">' . $name . '</a>
                        </li>
                    ';
            }
            ?>
        </ul>
    </div>
    <div class="box-footer search_box">
        <form action="index.php?act=sanpham" method="post">
            <input type="text" placeholder="Tìm kiếm sản phẩm tại đây" name="keyw" class="mb10">
            <input type="submit" value="Tìm kiếm" name="timkiem">
        </form>
    </div>
</div>

<div class="row_main ">
    <div class="box-title">Top 10 yêu thích</div>
    <div class="row_main box-content">
        <?php
        foreach ($dstop10 as $sp) {
            extract($sp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $img = $img_path . $img;
            echo '
                        <div class="row_main mb10 top10">
                            <img src="' . $img . '" alt="IMG">
                            <a href="' . $linksp . '">' . $name . '</a>
                        </div>
                        ';
        }
        ?>
    </div>
</div>

<script type="text/javascript">
const password_aside = document.getElementById('password_aside');
const toggle_pass_aside = document.getElementById('toggle_pass_aside');

function showPasswordAside() {


    if (password_aside.type === 'password') {
        password_aside.setAttribute('type', 'text');
        toggle_pass_aside.classList.add('hide')
    } else {
        password_aside.setAttribute('type', 'password');
        toggle_pass_aside.classList.remove('hide')
    }
}
</script>