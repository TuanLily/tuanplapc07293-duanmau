<div class="row_main">
    <div class="row_main frontiltle">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row_main form_content">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <p><span class="thongbao">* Trường bắt buộc</span></p>
            <div class="row_main mb10">
                Mã sản phẩm<br>
                <input type="text" name="masp" id="" placeholder="Mã tự động" disabled>
            </div>
            <div class="row_main mb10">
                Tên sản phẩm<span class="thongbao">*</span> <br>
                <input type="text" name="tensp" id="">
                <div class="thongbao">
                    <span>
                        <?php echo (isset($_SESSION['error']['tensp'])) ? $_SESSION['error']['tensp'] : '' ?>
                    </span>
                </div>

            </div>
            <div class="row_main mb10">
                Giá<span class="thongbao">*</span><br>
                <input type="number" name="giasp" id="">
                <div class="thongbao">
                    <span>
                        <?php echo (isset($_SESSION['error']['giasp'])) ? $_SESSION['error']['giasp'] : '' ?>
                    </span>
                </div>
            </div>
            <div class="row_main mb10">
                Hình <br>
                <input type="file" name="hinh" id="">
                <div class="thongbao">

                    <?php

                    if (isset($_SESSION['error']['hinh']) && $_SESSION['error']['hinh'] != "") {
                        if (isset($_SESSION['error']['hinh']['required'])) {
                            echo $_SESSION['error']['hinh']['required'];
                            unset($_SESSION['error']['hinh']);
                        }

                        if (isset($_SESSION['error']['hinh']['incorrect'])) {
                            echo $_SESSION['error']['hinh']['incorrect'];
                            unset($_SESSION['error']['hinh']);
                        }

                        if (isset($_SESSION['error']['hinh']['maxSize'])) {
                            echo $_SESSION['error']['hinh']['maxSize'];
                            unset($_SESSION['error']['hinh']);
                        }
                    } else {
                        unset($_SESSION['error']['hinh']);
                    }
                    ?>

                </div>
            </div>
            <div class="row_main mb10">
                Mô tả <br>
                <textarea id="editor" placeholder="nhập nội dung ở đây" name="mota"></textarea>
            </div>
            <div class="row_main mb10">
                Danh mục <br>
                <select name="iddm" class="form-select">
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="row_main mb10">
                <input type="submit" name="themmoi" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
            </div>
            <div class="thongbao">
                <?php
                if (isset($alert) && ($alert !== "")) {
                    echo $alert;
                }
                ?>
            </div>

        </form>
    </div>
</div>
</div>