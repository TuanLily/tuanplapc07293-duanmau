<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <?php extract($onesanpham); ?>
            <div class="box-title">Chi tiết sản phẩm -
                <span style="opacity: 0.7;;">Lượt xem:
                    <?php
                    update_luotxem($id);
                    echo $luotxem;
                    ?>
                </span>
            </div>
            <div class="row_main box-content">
                <?php
                $img = $img_path . $img;
                echo '<div class="row_main mb img_spct"><img src="' . $img . '"></div>';
                echo '
                <ul style="font-weight:bold;">
                    <li>Mã sản phẩm: SP - ' . $id . '</li>
                    <li>Tên sản phẩm: ' . $name . '</li>
                    <li style="color:#197856;">Tên sản phẩm: $' . number_format($price, 0, ',', '.') . '</li>
                    <li>Lượt xem: ' . $luotxem . '</li>
                </ul>
                ';
                // echo $mota;
                ?>
            </div>
        </div>
        <div class="row_main mb">
            <?php extract($onesanpham); ?>
            <div class="box-title">
                Mô tả sản phẩm
            </div>
            <div class="row_main box-content">
                <?php
                echo $mota;
                ?>
            </div>
        </div>
        <!-- Jquery 3.5.1  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Js load bình luận  -->
        <script>
        $(document).ready(function() {

            $("#binhluan").load("view/pages/binhluan/binhluanform.php", {
                idpro: <?= $id ?>
            });

        });
        </script>

        <div class="row_main" id="binhluan"></div>

        <div class="row_main mb">
            <div class="box-title">Sản phẩm liên quan</div>
            <div class="row_main box-content">
                <?php
                foreach ($spcungloai as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    echo '
                        <li><a href="' . $linksp . '">' . $name . '</a></li>

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