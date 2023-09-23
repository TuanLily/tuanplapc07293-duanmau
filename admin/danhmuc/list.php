<div class="row_main">
    <div class="row_main frontiltle">
        <h1>QUẢN LÝ HÀNG HÓA</h1>
    </div>
    <div class="row_main form_content">
        <div class="row_main mb10 form_dsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th>CHỨC NĂNG</th>
                </tr>
                <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $suadm = "index.php?act=suadm&ma_dm=".$ma_dm;
                        $xoadm = "index.php?act=xoadm&ma_dm=".$ma_dm;
                        echo '
                        <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>'.$ma_dm.'</td>
                    <td>'.$ten_dm.'</td>
                    <td>
                        <a href="'.$suadm.'"><input type="button" value="Sửa"></a>
                        <a href="'.$xoadm.'"><input type="button" value="Xóa"></a>
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
            <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>