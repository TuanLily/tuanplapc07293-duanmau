<div class="row_main">
    <div class="row_main frontiltle">
        <h1>THÊM MỚI DANH MỤC</h1>
    </div>
    <div class="row_main form_content">
        <form action="index.php?act=adddm" method="post">
            <p><span class="thongbao">* Trường bắt buộc</span></p>
            <div class="row_main mb10">
                Mã loại <br>
                <input type="text" name="maloai" id="" placeholder="Mã tự động" disabled>
            </div>
            <div class="row_main mb10">
                Tên Loại <span class="thongbao">*</span><br>
                <input type="text" name="tenloai" min="3">
                <div class="thongbao">
                    <span>
                        <?php echo (isset($_SESSION['error']['tenloai'])) ? $_SESSION['error']['tenloai'] : '' ?>
                    </span>
                </div>
            </div>

            <div class="row_main mb10">
                <input type="submit" name="themmoi" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
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