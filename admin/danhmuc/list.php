<div class="row_main">
    <div class="row_main frontiltle">
        <h1>QUẢN LÝ DANH MỤC</h1>
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
                        $suadm = "index.php?act=suadm&id=".$id;
                        $xoadm = "index.php?act=xoadm&id=".$id;
                        echo '
                        <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>
                        <a href="'.$suadm.'"><input type="button" value="Sửa"></a>
                        <a href="'.$xoadm.'"><input type="button" value="Xóa" onsubmit="return confirm("Bạn có chắc muốn xóa không?")></a>
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