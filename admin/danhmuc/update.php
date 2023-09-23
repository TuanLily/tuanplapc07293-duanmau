<?php
    if(is_array($danhmuc)){
        extract($danhmuc);
    }
?>

<div class="row_main">
    <div class="row_main frontiltle">
        <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row_main form_content">
        <form action="index.php?act=updatedm" method="post">
            <div class="row_main mb10">
                Mã loại <br>
                <input type="text" name="maloai" value="<?=$ma_dm?>" placeholder="Mã tự động" disabled>
            </div>
            <div class="row_main mb10">
                Tên Loại <br>
                <input type="text" name="tenloai" value="<?=$ten_dm?>">
            </div>

            <div class="row_main mb10">
                <input type="hidden" name="ma_dm" value="<?=$ma_dm?>">
                <input type="submit" name="capnhat" value="Cập Nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
            </div>
            <?php
            if(isset($alert)&&($alert !== "")){
                echo $alert;
            }
            ?>
        </form>
    </div>
</div>
</div>