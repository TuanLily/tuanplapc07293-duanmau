<?php
if(is_array($taikhoan)){
    extract($taikhoan);
}
?>

<div class="row_main">
    <div class="row_main frontiltle">
        <h1>SỬA TÀI KHOẢN</h1>
    </div>
    <div class="row_main form_content">
        <form action="index.php?act=updatetk" method="post">
            <div class="row_main mb10">
                Tên Tài Khoản: <br>
                <input type="text" name="user" value="<?=$user?>">
            </div>
            <div class="row_main mb10">
                Email: <br>
                <input type="email" name="email" value="<?=$email?>">
            </div>
            <div class="row_main mb10">
                Mật khẩu: <br>
                <input type="password" name="pass" value="<?=$pass?>">
            </div>
            <div class="row_main mb10">
                Địa chỉ: <br>
                <input type="text" name="address" value="<?=$address?>">
            </div>
            <div class="row_main mb10">
                Số điện thoại: <br>
                <input type="text" name="tel" value="<?=$tel?>">
            </div>

            <div class="row_main mb10">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" value="Cập nhật" name="capnhat">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=dskh"><input type="button" value="Danh sách"></a>

            </div>
        </form>
    </div>
</div>
</div>