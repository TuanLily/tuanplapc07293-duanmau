<div class="row_main">
    <div class="row_main frontiltle">
        <h1>QUẢN LÝ BÌNH LUẬN</h1>
    </div>
    <div class="row_main form_content">
        <div class="row_main mb10 form_dsloai">
            <table>
                <tr>
                    <th></th>
                    <th>Mã</th>
                    <th>Nội dung bình luận</th>
                    <th>Mã khách hàng</th>
                    <th>Mã sản phẩm</th>
                    <th>Ngày bình luận</th>
                    <th>Chức năng</th>
                </tr>
                <?php
                    foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $suabl = "index.php?act=suabl&id=".$id;
                        $xoabl = "index.php?act=xoabl&id=".$id;
                        echo '
                        <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>'.$id.'</td>
                    <td>'.$noidung.'</td>
                    <td>'.$iduser.'</td>
                    <td>'.$idpro.'</td>
                    <td>'.$ngaybinhluan.'</td>
                    <td>
                        <a href="'.$suabl.'"><input type="button" value="Sửa")"></a>
                        <a href="'.$xoabl.'"><input type="button" value="Xóa" onsubmit="return confirm("Bạn có chắc muốn xóa không?")"></a>
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