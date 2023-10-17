<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = '../upload/' . $img;
if (is_file($hinhpath)) {
    $hinhanh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinhanh = "Không có hình ảnh";
}
?>

<div class="row_main">
    <div class="row_main frontiltle">
        <h1>SỬA SẢN PHẨM</h1>
    </div>
    <div class="row_main form_content">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row_main mb10">
                Mã sản phẩm<br>
                <input type="text" name="masp" id="" disabled value="<?= $id ?>">
            </div>
            <div class="row_main mb10">
                Tên sản phẩm <br>
                <input type="text" name="tensp" value="<?= $name ?>">
            </div>
            <div class="row_main mb10">
                Giá <br>
                <input type="number" name="giasp" value="<?= $price ?>">
            </div>
            <div class="row_main mb10">
                Hình <br>
                <input type="file" name="hinh">
                <div class="" style="width: 15%; height: auto;">
                    <?= $hinhanh ?> (Hình cũ)
                </div>
            </div>
            <div class="row_main mb10">
                Mô tả <br>
                <textarea id="editor" placeholder="nhập nội dung ở đây" name="mota"><?= $mota ?></textarea>
            </div>
            <div class="row_main mb10">
                Danh Mục <br>
                <select name="iddm" class="form-select">
                    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        if ($iddm == $id) {
                            echo '<option value="' . $id . '" selected>' . $name . '</option>';
                        } else {
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }

                    }
                    ?>
                </select>
            </div>

            <div class="row_main mb10">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($alert) && ($alert !== "")) {
                echo $alert;
            }
            ?>
        </form>
    </div>
</div>
</div>