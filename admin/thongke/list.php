<div class="row_main">
    <div class="row_main frontiltle mb">
        <h1>THỐNG KÊ</h1>
    </div>
    <form action="index.php?act=thongke" method="post">
        <div class="row_main form_content">
            <div class="row_main mb10 form_dsloai">
                <table>
                    <tr>
                        <th>MÃ DANH MỤC</th>
                        <th>TÊN DANH MỤC</th>
                        <th>SỐ LƯỢNG HÀNG</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        echo '
                            <tr>
                                <td>' . $madm . '</td>
                                <td>' . $tendm . '</td>
                                <td>' . $countsp . '</td>
                                <td>$' . number_format($maxprice, 0, ',', '.') . '</td>
                                <td>$' . number_format($minprice, 0, ',', '.') . '</td>
                                <td>$' . number_format($avgprice, 0, ',', '.') . '</td>
                            </tr>
                        ';
                    }
                    ?>

                </table>
            </div>
            <div class="row_main mb10">
                <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
            </div>
        </div>
    </form>
</div>