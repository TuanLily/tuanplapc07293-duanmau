<div class="row_main">
    <div class="row_main frontiltle mb">
        <h1>QUẢN LÝ HÀNG HÓA</h1>
    </div>

    <form action="index.php?act=delete_list" method="post">
        <input type="text" name="keyw">

        <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="listcheck" value="CHỌN">
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
                        $hinhpath = '../upload/' . $img;
                        if (is_file($hinhpath)) {
                            $hinhanh = "<img src='" . $hinhpath . "' height='80'>";
                        } else {
                            $hinhanh = "Không có hình ảnh";
                        }
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        echo '
                        <tr>
                    <td> <input type="checkbox" class="checkbox" name="check_del[]" value="' . $id . '"></td>
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $hinhanh . '</td>
                    <td>$' . number_format($price, 0, ',', '.') . '</td>
                    <td>' . $luotxem . '</td>
                    <td>
                        <a href="' . $suasp . '"><input type="button" value="Sửa"></a>
                        <a href="' . $xoasp . '"><input type="button" value="Xóa" onClick="return confirm("Bạn có chắc muốn xóa không?")"></a>
                    </td>
                    </tr>
                ';
                    }
                    ?>


                </table>
            </div>
            <div class="row_main mb10">
                <div class="">
                    <label for="checkAll" class="btn btn-secondary chon">Chọn tất cả</label>
                    <label for="checkAll" class="btn btn-warning bochon" style="display:none;">Bỏ chọn</label>
                    <input type="checkbox" hidden id="checkAll">
                    <a href="index.php?act=delete_list"><input type="submit" value="Xóa mục đã chọn" name="delete"></a>
                    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                </div>

            </div>
        </div>
    </form>

</div>

<script type="text/javascript">
    var checkAll = document.querySelector('#checkAll')
    var checkBoxes = document.querySelectorAll('.checkbox')
    var chon = document.querySelector('.chon')
    var bochon = document.querySelector('.bochon')

    checkAll.onclick = () => {
        checkBoxes.forEach(checkBox => {
            if (checkAll.checked == true) {
                checkBox.checked = true
                chon.style.display = 'none'
                bochon.style.display = 'block'
            } else {
                checkBox.checked = false;
                chon.style.display = 'block'
                bochon.style.display = 'none'
            }
        });



    }
</script>