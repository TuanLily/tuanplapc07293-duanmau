<?php
function viewcart()
{
    global $img_path;
    $tong = 0;
    $i = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $thanhtien = $cart[3] * $cart[4];
        $gia = $cart[3];
        $tong += $thanhtien;
        $xoasp = '<a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a>                        ';
        echo '
                <tr> 
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart[1] . '</td>
                <td>$' . number_format($gia, 0, ",", ".") . '</td>
                <td>' . $cart[4] . '</td>
                <td>$' . number_format($thanhtien, 0, ",", ".") . '</td>
                <td>' . $xoasp . '</td>
                            
                </tr> 
                ';
        $i += 1;
    }
    echo '
              <td colspan="5">Tổng đơn hàng</td>
                    
              <td>$' . number_format($tong, 0, ",", ".") . '</td>

            ';
}

function bill()
{
    global $img_path;
    $tong = 0;
    $i = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $thanhtien = $cart[3] * $cart[4];
        $gia = $cart[3];
        $tong += $thanhtien;
        echo '
                <tr> 
                <td></td>
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart[1] . '</td>
                <td>$' . number_format($gia, 0, ",", ".") . '</td>
                <td>' . $cart[4] . '</td>
                <td>$' . number_format($thanhtien, 0, ",", ".") . '</td>
                            
                </tr> 
                ';
        $i += 1;
    }
    echo '
              <td colspan="5">Tổng đơn hàng</td>
                    
              <td>$' . number_format($tong, 0, ",", ".") . '</td>

            ';
}

function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    foreach ($listbill as $cart) {
        $hinh = $img_path . $cart['img'];
        $tong += $cart['thanhtien'];
        echo '
                <tr> 
                <td></td>
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart['name'] . '</td>
                <td>$' . number_format($cart['price'], 0, ",", ".") . '</td>
                <td>' . $cart['soluong'] . '</td>
                <td>$' . number_format($cart['thanhtien'], 0, ",", ".") . '</td>
                            
                </tr> 
                ';
        $i += 1;
    }
    echo '
            <tr>
              <td colspan="5">Tổng đơn hàng</td>      
              <td>$' . number_format($tong, 0, ",", ".") . '</td>
            </tr>
            ';
}

function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $thanhtien = $cart[3] * $cart[4];
        $tong += $thanhtien;
    }
    return $tong;
}


function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "insert into bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_lastInsertId($sql);
}

function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $cart = pdo_query($sql);
    return $cart;
}

function loadall_cart_count($idbill)
{
    $sql = "select * from cart inner join bill on cart.idbill = bill.id where idbill=" . $idbill;
    $cart = pdo_query($sql);
    return count($cart);
}

function loadall_bill($keyw = "", $iduser = 0)
{
    $sql = "select * from bill where 1";
    if ($iduser > 0) {
        $sql .= " and iduser=" . $iduser;
    }
    if ($keyw != "") {
        $sql .= " and id like '%" . $keyw . "%'";
    }
    $sql .= " order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = 'Đơn hàng mới';
            break;
        case '1':
            $tt = 'Đang xử lý';
            break;
        case '2':
            $tt = 'Đang giao hàng';
            break;
        case '3':
            $tt = 'Giao hàng thành công';
            break;

        default:
            $tt = 'Đơn hàng mới';
            break;
    }
    return $tt;
}

/**
 * Xóa bill
 * @param mixed $id
 * @return void
 */
function delete_bill($id)
{
    $sql = "delete from bill where id=" . $id;
    pdo_execute($sql);
}

function loadall_thongke()
{
    $sql = "select danhmuc.name as tendm, danhmuc.id as madm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql .= " from sanpham left join danhmuc on danhmuc.id=sanpham.iddm where 1";
    $sql .= " group by danhmuc.id order by danhmuc.id asc";
    $listthongke = pdo_query($sql);
    return $listthongke;
}

?>