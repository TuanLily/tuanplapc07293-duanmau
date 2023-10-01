<?php
    session_start();
    include 'view/header.php';
    include 'dao/pdo.php';
    include 'dao/danhmuc.php';
    include 'dao/sanpham.php';
    include 'dao/taikhoan.php';
    include 'dao/cart.php';
    include 'global.php';

    if(!isset($_SESSION['mycart'])){
        $_SESSION['mycart'] = [];
    }
    
    $sanphamnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $dstop10=loadall_sanpham_top10();
    
    if((isset($_GET['act']))&&($_GET['act']!="")){
        $act = $_GET['act'];
        switch ($act) {
            case 'gioithieu':
                include 'view/pages/gioithieu.php';
                break;

            case 'lienhe':
                include 'view/pages/lienhe.php';
                break;

            case 'sanphamct':
                if((isset($_GET['idsp']) && $_GET['idsp']>0)){
                    $id = $_GET['idsp'];
                    $onesanpham = loadone_sanpham($id);
                    extract($onesanpham);
                    
                    $spcungloai = load_sanpham_cungloai($id,$iddm);
                include 'view/pages/sanphamchitiet.php';
                }else{
                include 'view/home.php';
                }
            break;

            case 'sanpham':
                if((isset($_POST['keyw']) && $_POST['keyw']!="")){
                    $keyw = $_POST['keyw'];
                    
                }else{
                    $keyw = "";
                }
                if((isset($_GET['iddm']) && $_GET['iddm']>0)){
                    $iddm = $_GET['iddm'];
                    
                }else{
                    $iddm = 0;
                }
                $dssp = loadall_sanpham($keyw,$iddm);
                $tendm = load_ten_danhmuc($iddm);
                include 'view/pages/sanpham.php';

            break;

            case 'dangky':

            if((isset($_POST['dangky']) && $_POST['dangky'])){
                $email = $_POST['email'];
                $user = $_POST['user'];
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                insert_taikhoan($email,$user,$name,$pass);
                $thongbao = "Bạn đã đăng ký thành công, vui lòng đăng nhập để có thể sử dụng các dịch vụ của shop!";
            }

            include 'view/pages/taikhoan/dangky.php';
            break;

            case 'dangnhap':

            if((isset($_POST['dangnhap']) && $_POST['dangnhap'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $check_user = check_user($user, $pass);
                if(is_array($check_user)){
                    $_SESSION['user'] = $check_user;
                    $tb = "Đăng nhập thành công!";
                    header('location: index.php');
                }else{
                    $tb = "Tài khoản không tồn tại, vui lòng kiểm tra lại thông tin!";
                }
            }

            include 'view/home.php';
            break;

            case 'edit_taikhoan':

            if((isset($_POST['capnhat']) && $_POST['capnhat'])){
                $id = $_POST['id'];
                $user = $_POST['user'];
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];

                capnhat_taikhoan($id, $user, $name, $pass, $email, $address, $tel);
                $_SESSION['user'] = check_user($user, $pass);
                header('location: index.php?act=edit_taikhoan');

            }

            include 'view/pages/taikhoan/edit_taikhoan.php';
            break;

            case 'quenmk':

            if((isset($_POST['goiemail']) && $_POST['goiemail'])){

                $email = $_POST['email'];
                $check_email = check_email($email);
                if(is_array($check_email)){
                    $thongbao = "Mật khẩu của bạn là: ".$check_email['pass']."";
                }else{
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
            if((isset($_POST['addtocart']) && $_POST['addtocart'])){
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
                if(isset($_GET['idcart'])){
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                }else{
                    $_SESSION['mycart'] = []; 
                }
                header('location: index.php?act=viewcart');
            break;    
            
            case 'bill':
                include 'view/pages/cart/bill.php';
                break;

            case 'billconfirm':
                if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
                    if(isset($_SESSION['user'])){
                        $iduser = $_SESSION['user']['id'];
                    }else{
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
                    $idbill = insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);
                    //insert into cart với &_SESSiON['mycart'] với $idbill

                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                    }
                    // Xóa sesion cart
                    $_SESSION['cart'] = [];
                    
                    $bill = loadone_bill($idbill);
                    $billct= loadall_cart($idbill);
                    include 'view/pages/cart/billconfirm.php';
                
                }
                    
                break;

            case 'mybill':
                $listbill = loadall_bill($_SESSION['user']['id']);
                include 'view/pages/cart/mybill.php';
                break;
            //Kết thúc phần giỏ hàng / thanh toán

            
            default:
                include 'view/home.php';
                break;
        }
    }else{
         include 'view/home.php';
    }
    include 'view/footer.php';

?>