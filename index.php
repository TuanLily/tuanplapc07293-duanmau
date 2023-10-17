<?php
session_start();
ob_start();
include_once './mail/index.php';
include 'view/header.php';
include 'dao/pdo.php';
include 'dao/connect.php';
include 'dao/danhmuc.php';
include 'dao/sanpham.php';
include 'dao/taikhoan.php';
include 'dao/cart.php';
include 'dao/delete_list.php';
include 'global.php';
global $conn;


if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

$sanphamnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();
$mail = new Mailer();
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

                if ($checkOk == 1) {
                    password_verify($rpass, $pass_hash);
                    insert_taikhoan($email, $user, $name, $pass_hash);
                    echo '<script>alert("Đăng ký thành công, vui lòng đăng nhập")</script>';

                }
            }

            include 'view/pages/taikhoan/dangky.php';
            break;

        case 'dangnhap':

            if ((isset($_POST['dangnhap']) && $_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $check_user_pass = check_user_validate($user);
                $pass_check = password_verify($pass, $check_user_pass['pass']);

                if ($pass_check == true) {
                    $_SESSION['user'] = $check_user_pass;
                    echo '<script>alert("Đăng nhập thành công")</script>';

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
                if ($check_tel == 0) {
                    $_SESSION['error']['tel'] = "Số điện thoại không hợp lệ";
                }
                if ($check_tel == 1) {

                    $update_tk = capnhat_taikhoan($id, $user, $name, $pass, $email, $address, $tel);
                    $_SESSION['user'] = check_user($user, $pass);
                    echo '<script>alert("Cập nhật thành công")</script>';
                    if ($update_tk == 0) {
                        echo '<script>alert("Cập nhật thất bại")</script>';
                    }
                }
            }
            include 'view/pages/taikhoan/edit_taikhoan.php';
            break;

        case 'doimk':
            if ((isset($_POST['doimatkhau']) && $_POST['doimatkhau'])) {
                $err = array();
                $pass = $_POST['pass'];
                $rpass = $_POST['rpass'];
                $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                $checkOk = 1;


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

                if ($checkOk == 1) {
                    password_verify($rpass, $pass_hash);
                    update_edit_pass($_SESSION['email'], $pass_hash);
                    // $thongbao = "YEs";
                    echo '<script>alert("Mật khẩu đã được đổi")</script>';
                }
            }
            include 'view/pages/taikhoan/doimatkhau.php';
            break;


        case 'quenmk':

            if ((isset($_POST['goiemail']) && $_POST['goiemail'])) {
                $err = array();
                $email = $_POST['email'];
                if ($email == '') {
                    $_SESSION['error']['email'] = 'Không được để trống';
                }
                if (empty($_SESSION['error']['email'])) {
                    $check_email = check_email($email);
                    $code = substr(rand(0, 999999), 0, 6);
                    $title = "Quên mật khẩu";
                    $content = "Mã xác minh của bạn là <span style='color:tomato;'>" . $code . "</span>";
                    $mail->sendMail($title, $content, $email);

                    $_SESSION['email'] = $email;
                    $_SESSION['code'] = $code;
                    header('Location: index.php?act=xacminh');
                }

            }

            include 'view/pages/taikhoan/quenmatkhau.php';
            break;

        case 'xacminh':

            if (isset($_POST['xacminh'])) {
                $err = array();
                if ($_POST['maxm'] != $_SESSION['code']) {
                    $_SESSION['error']['maxm'] = 'Mã xác minh không hợp lệ';
                } else {
                    header('Location: index.php?act=doimk');
                }
            }

            include 'view/pages/taikhoan/xacminh.php';
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
            if (!isset($_SESSION['mycart'])) {
                $_SESSION['mycart'] = [];
            }
            // Kiểm tra người dùng có bấm vào nút thêm giỏ hàng hay chưa
            if ((isset($_POST['addtocart']) && $_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $price * $soluong;


                $product = [
                    "id" => $id,
                    "name" => $name,
                    "img" => $img,
                    "price" => $price,
                    "soluong" => $soluong,
                    "thanhtien" => $thanhtien

                ];

                // Biến nếu không tìm tháy cho = false còn có = true
                $found = false;

                // Kiểm tra xem có tồn tại $_SESSION['cart'] không
                if (isset($_SESSION['mycart'])) {
                    foreach ($_SESSION['mycart'] as $productID) {

                        // Kiểm tra thằng id có  = với $productID không 
                        if ($id == $productID['id']) {
                            // Trong $_SESSION['cart'] láy mảng là id mấy và láy số lượng của nó
                            $_SESSION['mycart']["$id"]['soluong']++;
                            $found = true;
                            break;
                        }
                    }
                }

                if (!$found) {
                    $_SESSION['mycart']["$id"] = $product;
                }

                // header('Location: index.php?act=addtocart');
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
                //insert into cart với &_SESSiON['cart'] với $idbill

                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart['id'], $cart['img'], $cart['name'], $cart['price'], $cart['soluong'], $cart['thanhtien'], $idbill);
                }
                // Xóa session cart
                $_SESSION['cart'] = [];

                $bill = loadone_bill($idbill);
                $billct = loadall_cart($idbill);
            }
            include 'view/pages/cart/billconfirm.php';

            break;

        case 'mybill':
            // $listbill = loadall_bill($keyw = "", $iduser = 0);
            $listbill = loadall_bill($keyw = "", $_SESSION['user']['id']);
            include 'view/pages/cart/mybill.php';
            break;

        case 'billct':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $bill = loadone_bill($id);
                $billct = loadall_cart($id);
            }
            include 'view/pages/cart/billct.php';
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