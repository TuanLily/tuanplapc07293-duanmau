<div class="row_main mb">
    <div class="box-title">Tài Khoản</div>
    <div class="box-content form_tai_khoan">
        <form action="#" method="post">
            <div class="row_main mb10">
                Tên đăng nhập <br>
                <input type="text" name="user" id="">
            </div>
            <div class="row_main mb10">
                Mật khẩu <br>
                <input type="password" name="pass" id="">
            </div>
            <div class="row_main mb10">
                <input type="checkbox" name="" id=""> Ghi nhớ tài khoản?
            </div>
            <div class="row_main mb10">
                <input type="submit" value="Đăng nhập">
            </div>
        </form>
        <li><a href="#">Quên mật khẩu</a></li>
        <li><a href="#">Đăng ký thành viên</a></li>
    </div>
</div>

<div class="row_main mb">
    <div class="box-title">Danh mục</div>
    <div class="box-content2 menu_doc">
        <ul>
            <?php
                $i = 0;
                foreach ($dsdm as $dm){
                    extract($dm);
                    $linkdm ="index.php?act=sanpham&iddm=".$id;
                    echo '
                        <li>
                            <a href="'.$linkdm.'">'.$name.'</a>
                        </li>
                    ';
                }
            ?>
        </ul>
    </div>
    <div class="box-footer search_box">
        <form action="#" method="post">
            <input type="text" placeholder="Tìm kiếm sản phẩm tại đây">
        </form>
    </div>
</div>

<div class="row_main ">
    <div class="box-title">Top 10 yêu thích</div>
    <div class="row_main box-content">
        <?php
                    foreach ($dstop10 as $sp){
                        extract($sp);
                        $linksp= "index.php?act=sanphamct&idsp=".$id;
                        $img = $img_path.$img;
                        echo '
                        <div class="row_main mb10 top10">
                            <img src="'.$img.'" alt="IMG">
                            <a href="'.$linksp.'">'.$name.'</a>
                        </div>
                        ';
                    }
                ?>
    </div>
</div>