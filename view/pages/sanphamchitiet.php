<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <?php extract($onesanpham);?>
            <div class="box-title">Chi tiết sản phẩm</div>
            <div class="row_main box-content">
                <?php
                    $img = $img_path.$img;
                    echo '<div class="row_main mb img_spct"><img src="'.$img.'"></div>';
                    echo $mota;
                ?>
            </div>
        </div>
        <div class="row_main mb">
            <div class="box-title">Bình luận</div>
            <div class="row_main box-content">

            </div>
        </div>

        <div class="row_main mb">
            <div class="box-title">Sản phẩm liên quan</div>
            <div class="row_main box-content">
                <?php
                   foreach ($spcungloai as $sp){
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=".$id;
                    echo '
                        <li><a href="'.$linksp.'">'.$name.'</a></li>

                    ';
                   }
                ?>
            </div>
        </div>
    </div>

    <div class="box-right">
        <?php require_once 'aside.php'; ?>
    </div>
</div>