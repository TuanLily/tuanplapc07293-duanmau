<?php
require_once "../dao/pdo.php";

include "../dao/connect.php";
include "../dao/danhmuc.php";
include "../dao/sanpham.php";
include "../dao/taikhoan.php";
include "../dao/binhluan.php";
include "../dao/cart.php";
include "../dao/delete_list.php";
include "../global.php";
include "header.php";


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

        // Bắt đầu phần danh mục
        case 'adddm':
            //Kiểm tra người dùng có ấn vào nút add hay không?
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                if (!empty($tenloai) && (strlen($tenloai) > 3)) {
                    insert_danhmuc($tenloai);
                    $alert = "Thêm thành công!";
                } else {
                    if ($tenloai == "") {
                        $_SESSION['error']['tenloai'] = 'Không được để trống';
                    } else {
                        $_SESSION['error']['tenloai'] = 'Tên phải có ít nhất 3 ký tự';
                    }
                }

            }
            include "danhmuc/add.php";
            break;

        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;



        case 'suadm';
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;


        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $alert = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        //Kết thúc phần danh mục

        //Bắt đầu phần hàng hóa
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $iddm = $_POST['iddm'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($hinh);
                $uploadOk = 1;
                // if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                // }

                // Kiểm tra các giá trị trống
                if ($tensp == "") {
                    $_SESSION['error']['tensp'] = 'Không được để trống';
                    $uploadOk = 0;
                }
                if ($giasp == "" || $giasp < 0) {
                    $_SESSION['error']['giasp'] = 'Không được để trống hoặc giá trị âm';
                    $uploadOk = 0;
                }
                if (empty($target_file)) {
                    $_SESSION['error']['hinh'] = 'File không được để trống';
                    $uploadOk = 0;
                }

                // Kiểm tra định dạng file
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" && $imageFileType != "dng" && $imageFileType != "webp"
                ) {
                    $_SESSION['error']['hinh'] = 'Định dạng ảnh không phù hợp';
                    $uploadOk = 0;
                }

                // Kiểm tra dung lượng file
                if ($_FILES["hinh"]["size"] > 5000000) { // kiểm tra 5MB = 5000000 Bytes
                    $_SESSION['error']['hinh'] = 'Hình không vượt quá 5MB';
                    $uploadOk = 0;
                }

                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                        $alert = "Thêm thành công!";
                    }
                }
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case 'listsp':
            if (isset($_POST['listcheck']) && ($_POST['listcheck'])) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];

            } else {
                $keyw = '';
                $iddm = 0;
            }

            $listsanpham = loadall_sanpham($keyw, $iddm);
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham();

            include "sanpham/list.php";
            break;



        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham();
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;


        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $alert = "Cập nhật thành công";

            }
            $listsanpham = loadall_sanpham();
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/list.php";
            break;

        //Kết thúc phần hàng hóa

        //Bắt đầu phần khách hàng

        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }

            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = loadone_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();

            include "taikhoan/update.php";
            break;

        case 'updatetk':

            if ((isset($_POST['capnhat']) && $_POST['capnhat'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];

                capnhat_taikhoan($id, $user, $name, $pass, $email, $address, $tel);
                $alert = "Cập nhật thành công";

            }
            $listtaikhoan = loadall_taikhoan();
            include 'taikhoan/list.php';
            break;

        //Kết thúc phần khách hàng

        //Bắt đầu phần bình luận
        case 'dsbl':
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;

        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }

            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        //Kết thúc phần bình luận

        //Bắt đầu phần đơn hàng
        case 'listbill':
            if (isset($_POST['keyw']) && ($_POST['keyw'] != "")) {
                $keyw = $_POST['keyw'];
            } else {
                $keyw = "";
            }
            $listbill = loadall_bill($keyw, 0);
            include "bill/list.php";
            break;

        case 'xoabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bill($_GET['id']);
            }
            $listbill = loadall_bill($keyw, 0);
            include "bill/list.php";
            break;
        //Kết thúc phần đơn hàng

        //Bắt đầu phần thống kê
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;

        case 'bieudo':
            $listthongke = loadall_thongke();
            include "home.php";
            break;
        //Kết thúc phần thống kế

        case 'delete_list_sp':
            if (isset($_POST['delete'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RemoveSelect_sp($del);
            }
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;

        case 'delete_list_bill':
            if (isset($_POST['delete'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RemoveSelect_bill($del);
            }
            $listbill = loadall_bill();
            include "bill/list.php";
            break;

        case 'delete_list_bl':
            if (isset($_POST['delete'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RemoveSelect_bl($del);
            }
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;

        case 'delete_list_dm':
            if (isset($_POST['delete'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RemoveSelect_dm($del);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'delete_list_taikhoan':
            if (isset($_POST['delete'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RemoveSelect_taikhoan($del);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'delete_list_tk':
            if (isset($_POST['delete'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RemoveSelect_thongke($del);
            }
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;



        default:
            include "home.php";
    }
} else {
    include "home.php";
}

include "footer.php";

?>