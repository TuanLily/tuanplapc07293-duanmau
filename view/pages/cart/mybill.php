<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title">ĐƠN HÀNG CỦA BẠN</div>
            <div class="row_main box-content cart">
                <table>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>NGÀY ĐẶT</th>
                        <th>SỐ LƯỢNG HÀNG</th>
                        <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                        <th>TRẠNG THÁI ĐƠN HÀNG</th>
                    </tr>
                    <?php
                    if (is_array($listbill)) {
                        foreach ($listbill as $bill) {
                            extract($bill);
                            $ttdh = get_ttdh($bill['bill_status']);
                            $countsp = loadall_cart_count($bill['id']);
                            echo '
                                <tr>
                                        <td>MDH-' . $bill['id'] . '</td>
                                        <td>' . $bill['ngaydathang'] . '</td>
                                        <td>' . $countsp . '</td>
                                        <td>$' . number_format($bill['total'], 0, ',', '.') . '</td>
                                        <td>' . $ttdh . '</td>
                                </tr>
                           ';
                        }
                    }
                    ?>


                </table>
            </div>
        </div>


    </div>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>