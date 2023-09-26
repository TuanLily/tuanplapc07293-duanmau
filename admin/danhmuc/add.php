<div class="row_main">
    <div class="row_main frontiltle">
        <h1>THÊM MỚI DANH MỤC</h1>
    </div>
    <div class="row_main form_content">
        <form action="index.php?act=adddm" method="post">
            <div class="row_main mb10">
                Mã loại <br>
                <input type="text" name="maloai" id="" placeholder="Mã tự động" disabled>
            </div>
            <div class="row_main mb10">
                Tên Loại <br>
                <input type="text" name="tenloai" id="" required title="Không được để trống">
            </div>

            <div class="row_main mb10">
                <input type="submit" name="themmoi" value="Thêm mới">
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

<script>
$(function() {
    // Summernote
    $('#summernote').summernote()
})
</script>