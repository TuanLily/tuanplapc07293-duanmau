<?php
    include "../dao/pdo.php";
    include "header.php";

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'adddm':
            //Kiểm tra người dùng có ấn vào nút add hay không?
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
               $tenloai = $_POST['tenloai']; 
               $sql = "INSERT INTO danhmuc(ten_dm) VALUES ('$tenloai')";
               pdo_execute($sql);
               $alert = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;

            case 'listdm':
                $sql = "SELECT * FROM danhmuc order by ten_dm";
                $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;
            
            case 'xoadm':
            if(isset($_GET['ma_dm'])&&($_GET['ma_dm']>0)){
                $sql = 'delete from danhmuc where ma_dm='.$_GET['ma_dm'].'';
                pdo_execute($sql);
            }

            $sql = "SELECT * FROM danhmuc order by ten_dm DESC";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;
            
            case 'suadm':
            if(isset($_GET['ma_dm'])&&($_GET['ma_dm']>0)){
                $sql = 'SELECT * FROM danhmuc where ma_dm='.$_GET['ma_dm'].'';
                $danhmuc = pdo_query_one($sql);
            }
            include "danhmuc/update.php";
            break;


            case 'updatedm':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                $tenloai = $_POST['tenloai']; 
                $ma_dm = $_POST['ma_dm']; 
                $sql = "UPDATE danhmuc SET ten_dm='".$tenloai."'where ma_dm=".$ma_dm;
                pdo_execute($sql);
                $alert = "Cập nhật thành công";
             }
             $sql = "SELECT * FROM danhmuc order by ten_dm DESC";
             $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;
            
            
            
            
            case 'addsp':
            include "sanpham/add.php";
            break;

            

            default:
            include "home.php";
        }
    }else{
        include "home.php"; 
    }

    include "footer.php";


?>