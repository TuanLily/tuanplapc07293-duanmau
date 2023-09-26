<?php
    if(is_array($dm)){
        extract($dm);
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
                <input type="text" name="maloai" placeholder="Mã tự động" disabled>
            </div>
            <div class="row_main mb10">
                Tên Loại <br>
                <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name?>">
            </div>

            <div class="row_main mb10">
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id?>">
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