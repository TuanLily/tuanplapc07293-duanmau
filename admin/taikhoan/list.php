<div class="row_main">
    <div class="row_main frontiltle">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row_main form_content">
        <div class="row_main mb10 form_dsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ TÀI KHOẢN</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Vai trò</th>
                    <th>CHỨC NĂNG</th>
                </tr>
                <?php
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        $suatk = "index.php?act=suatk&id=".$id;
                        $xoatk = "index.php?act=xoatk&id=".$id;
                        echo '
                        <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>'.$id.'</td>
                    <td>'.$user.'</td>
                    <td>'.$pass.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>'.$tel.'</td>
                    <td>'.$role.'</td>
                    <td>
                        <a href="'.$suatk.'"><input type="button" value="Sửa")"></a>
                        <a href="'.$xoatk.'"><input type="button" value="Xóa" onsubmit="return confirm("Bạn có chắc muốn xóa không?")"></a>
                    </td>
                    </tr>
                ';
                    }
                ?>


            </table>
        </div>
        <div class="row_main mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa mục đã chọn">
        </div>
    </div>
</div>