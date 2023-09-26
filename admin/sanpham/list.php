<div class="row_main">
    <div class="row_main frontiltle mb">
        <h1>QUẢN LÝ HÀNG HÓA</h1>
    </div>

    <form action="index.php?act=listsp" method="post">
        <input type="text" name="keyw">

        <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
                foreach ($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
            ?>
        </select>
        <input type="submit" name="listcheck" value="CHỌN">
    </form>
    <div class="row_main form_content">
        <div class="row_main mb10 form_dsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH</th>
                    <th>GIÁ</th>
                    <th>LƯỢT XEM</th>
                    <th>CHỨC NĂNG</th>
                </tr>
                <?php
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $hinhpath = '../upload/'.$img;
                        if(is_file($hinhpath)){
                            $hinhanh = "<img src='".$hinhpath."' height='80'>";
                        }else{
                            $hinhanh = "Không có hình ảnh";
                        }
                        $suasp = "index.php?act=suasp&id=".$id;
                        $xoasp = "index.php?act=xoasp&id=".$id;
                        echo '
                        <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$hinhanh.'</td>
                    <td>'.$price.'</td>
                    <td>'.$luotxem.'</td>
                    <td>
                        <a href="'.$suasp.'"><input type="button" value="Sửa"></a>
                        <a href="'.$xoasp.'"><input type="button" value="Xóa"></a>
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
            <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>