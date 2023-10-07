<?php
session_start();
include 'view/header.php';
include 'dao/pdo.php';
include 'dao/danhmuc.php';
include 'dao/sanpham.php';
include 'dao/taikhoan.php';
include 'dao/cart.php';
include 'global.php';
global $conn;


if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

$sanphamnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'gioithieu':
            include 'view/pages/gioithieu.php';
            break;

        case 'lienhe':
            include 'view/pages/lienhe.php';
            break;

        case 'sanphamct':
            if ((isset($_GET['idsp']) && $_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesanpham = loadone_sanpham($id);
                extract($onesanpham);

                $spcungloai = load_sanpham_cungloai($id, $iddm);
                include 'view/pages/sanphamchitiet.php';
            } else {
                include 'view/home.php';
            }
            break;

        case 'sanpham':
            if ((isset($_POST['keyw']) && $_POST['keyw'] != "")) {
                $keyw = $_POST['keyw'];

            } else {
                $keyw = "";
            }
            if ((isset($_GET['iddm']) && $_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];

            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($keyw, $iddm);
            $tendm = load_ten_danhmuc($iddm);
            include 'view/pages/sanpham.php';

            break;

        case 'dangky':
            if ((isset($_POST['dangky']) && $_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $rpass = $_POST['rpass'];
                $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                $rpass_hash = password_hash($rpass, PASSWORD_DEFAULT);
                $checkOk = 1;

                if (empty($user)) {
                    $_SESSION['error']['user'] = 'Không được để trống';
                    $checkOk = 0;
                } elseif (isset($user)) {
                    // Kiểm tra xem tên người dùng đã tồn tại hay chưa
                    $checkuser = check_user_validate($user);
                    if ($checkuser !== false) {
                        $_SESSION['error']['user'] = 'Tên người dùng này đã được đăng ký';
                        $checkOk = 0;
                    }
                }

                if (empty($email)) {
                    $_SESSION['error']['email'] = 'Không được để trống';
                    $checkOk = 0;
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['error']['email'] = 'Email không đúng định dạng';
                    $checkOk = 0;
                } else {
                    // Kiểm tra xem email đã tồn tại hay chưa
                    $checkemail = check_email($email);
                    if ($checkemail !== false) {
                        $_SESSION['error']['email'] = 'Email này đã được đăng ký';
                        $checkOk = 0;
                    }
                }

                if (empty($name)) {
                    $_SESSION['error']['name'] = 'Không được để trống';
                    $checkOk = 0;
                }

                if (empty($pass)) {
                    $_SESSION['error']['pass'] = 'Không được để trống';
                    $checkOk = 0;
                } else if (strlen($pass) < 4) {
                    $_SESSION['error']['pass'] = 'Mật khẩu phải có ít nhất 4 ký tự';
                    $checkOk = 0;
                } else {
                    // Lưu trữ mật khẩu đã được mã hóa hash()
                    $pass_hash;
                }

                if (empty($rpass)) {
                    $_SESSION['error']['rpass'] = 'Không được để trống';
                    $checkOk = 0;
                } else {
                    // Sử dụng hàm password_verify() để kiểm tra mật khẩu xác nhận
                    if (!password_verify($rpass, $pass_hash)) {
                        $_SESSION['error']['rpass'] = 'Mật khẩu không trùng khớp';
                        $checkOk = 0;
                    }
                }
                echo $checkOk . '<br>';
                var_dump($_SESSION['error']['rpass']);



                if ($checkOk == 1) {
                    password_verify($rpass, $pass_hash);
                    insert_taikhoan($email, $user, $name, $pass_hash);
                    $thongbao = "Bạn đã đăng ký thành công, vui lòng đăng nhập để có thể sử dụng các dịch vụ của shop!";
                }
            }

            include 'view/pages/taikhoan/dangky.php';
            break;

        case 'dangnhap':

            if ((isset($_POST['dangnhap']) && $_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                echo $pass . '<br>';
                // $pass_hash = md5($pass);

                $check_user_pass = check_user_validate($user);
                $pass_check = password_verify($pass, $check_user_pass['pass']);

                if ($pass_check == true) {
                    $_SESSION['user'] = $check_user_pass;
                    $tb = "Đăng nhập thành công";
                } else {
                    $tb = "Sai tài khoản hoặc mật khẩu!";

                }


            }

            include 'view/home.php';
            break;

        case 'edit_taikhoan':

            if ((isset($_POST['capnhat']) && $_POST['capnhat'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];

                // Kiểm tra số điện thoại
                $regex = '/^[0-9]{10}$/';
                $check_tel = preg_match($regex, $tel);
                var_dump($check_tel);
                if ($check_tel == 0) {
                    $_SESSION['error']['tel'] = "Số điện thoại không hợp lệ";
                }
                if ($check_tel == 1) {

                    $update_tk = capnhat_taikhoan($id, $user, $name, $pass, $email, $address, $tel);
                    $_SESSION['user'] = check_user($user, $pass);
                    if ($update_tk == 1) {
                        $tb = "Cập nhật thành công";
                    } else {
                        $tb = "Cập nhật thất bại";
                    }
                }


                // header('location: index.php?act=edit_taikhoan');

            }
            include 'view/pages/taikhoan/edit_taikhoan.php';
            break;

        case 'quenmk':

            if ((isset($_POST['goiemail']) && $_POST['goiemail'])) {

                $email = $_POST['email'];
                $check_email = check_email($email);
                if (is_array($check_email)) {
                    $thongbao = "Mật khẩu của bạn là: " . $check_email['email'] . "";
                } else {
                    $thongbao = "Không có email này nên không thể cung cấp mật khẩu";
                }
            }

            include 'view/pages/taikhoan/quenmatkhau.php';
            break;

        case 'thoat':
            session_unset();
            header('location: index.php');

            break;

        //Bắt đầu phần giỏ hàng / thanh toán

        case 'viewcart':
            include 'view/pages/cart/viewcart.php';
            break;

        case 'addtocart':
            if ((isset($_POST['addtocart']) && $_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $price * $soluong;
                $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);

            }

            include 'view/pages/cart/viewcart.php';

            break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;

        case 'bill':
            include 'view/pages/cart/bill.php';
            break;

        case 'billconfirm':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                if (isset($_SESSION['user'])) {
                    $iduser = $_SESSION['user']['id'];
                } else {
                    $id = 0;
                }
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:s d/m/Y');
                $tongdonhang = tongdonhang();
                //Tạo bill
                $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
                //insert into cart với &_SESSiON['mycart'] với $idbill

                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                }
                // Xóa sesion cart
                $_SESSION['cart'] = [];

                $bill = loadone_bill($idbill);
                $billct = loadall_cart($idbill);
                include 'view/pages/cart/billconfirm.php';

            }

            break;

        case 'mybill':
            $listbill = loadall_bill($keyw = "", $iduser = 0);
            include 'view/pages/cart/mybill.php';
            break;
        //Kết thúc phần giỏ hàng / thanh toán


        default:
            include 'view/home.php';
            break;
    }
} else {
    include 'view/home.php';
}
include 'view/footer.php';

?>