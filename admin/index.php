<?php
    require_once "../dao/pdo.php";
    
    include "../dao/danhmuc.php";
    include "../dao/sanpham.php";
    include "../dao/taikhoan.php";
    include "../dao/binhluan.php";
    include "../dao/cart.php";
    include "header.php";
    
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){

            // Bắt đầu phần danh mục
            case 'adddm':
            //Kiểm tra người dùng có ấn vào nút add hay không?
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
               $tenloai = $_POST['tenloai']; 
               insert_danhmuc($tenloai);
               $alert = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;

            case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            
            case 'xoadm':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            
            case 'suadm';
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;


            case 'updatedm':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
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
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
               $tensp = $_POST['tensp'];
               $giasp = $_POST['giasp'];
               $mota = $_POST['mota'];
               $iddm = $_POST['iddm'];
               $hinh =$_FILES['hinh']['name'];
               $target_dir = "../upload/";
               $target_file = $target_dir . basename($_FILES['hinh']['name']);
               if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)){}
                insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
               $alert = "Thêm thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;

            case 'listsp':
            if(isset($_POST['listcheck'])&&($_POST['listcheck'])){
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];

            }else{
                $keyw = '';
                $iddm = 0;
            }

            $listsanpham = loadall_sanpham($keyw, $iddm);
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/list.php";
            break;
            
            case 'xoasp':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_sanpham($_GET['id']);                
            }
            $listsanpham = loadall_sanpham();

            include "sanpham/list.php";
            break;
            
            case 'suasp':
            if(isset($_GET['id'])&&($_GET['id']>0)){
               $sanpham = loadone_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham();
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;


            case 'updatesp':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
               $id = $_POST['id'];
               $iddm = $_POST['iddm'];
               $tensp = $_POST['tensp'];
               $giasp = $_POST['giasp'];
               $mota = $_POST['mota'];
               $hinh =$_FILES['hinh']['name'];
               $target_dir = "../upload/";
               $target_file = $target_dir . basename($_FILES['hinh']['name']);
               if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)){}
               update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
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
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_taikhoan($_GET['id']);                
            }
        
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

            case 'suatk':
            if(isset($_GET['id'])&&($_GET['id']>0)){
               $taikhoan = loadone_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            
            include "taikhoan/update.php";
            break;

            case 'updatetk':

            if((isset($_POST['capnhat']) && $_POST['capnhat'])){
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
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_binhluan($_GET['id']);            
            }
        
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
            //Kết thúc phần bình luận

            //Bắt đầu phần đơn hàng
            case 'listbill':
            if(isset($_POST['keyw'])&&($_POST['keyw']!="")){
                $keyw = $_POST['keyw'];
            }else{
                $keyw ="";
            }
            $listbill = loadall_bill($keyw, 0);
            include "bill/list.php";
            break;

            case 'xoabill':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_bill($_GET['id']);            
            }
            $listbill = loadall_bill($keyw, 0);
            include "bill/list.php";
            break;
            //Kết thúc phần đơn hàng
            
            

            default:
            include "home.php";
        }
    }else{
        include "home.php"; 
    }

    include "footer.php";

?>