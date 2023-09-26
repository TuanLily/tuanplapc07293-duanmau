<div class="row_main">
    <div class="row_main frontiltle">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row_main form_content">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row_main mb10">
                Mã sản phẩm<br>
                <input type="text" name="masp" id="" placeholder="Mã tự động" disabled>
            </div>
            <div class="row_main mb10">
                Tên sản phẩm <br>
                <input type="text" name="tensp" id="">
            </div>
            <div class="row_main mb10">
                Giá <br>
                <input type="number" name="giasp" id="">
            </div>
            <div class="row_main mb10">
                Hình <br>
                <input type="file" name="hinh" id="">
            </div>
            <div class="row_main mb10">
                Mô tả <br>
                <textarea id="editor" placeholder="nhập nội dung ở đây" name="mota"></textarea>
            </div>
            <div class="row_main mb10">
                Danh mục <br>
                <select name="iddm" class="form-select">
                    <?php
                        foreach ($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="row_main mb10">
                <input type="submit" name="themmoi" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
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