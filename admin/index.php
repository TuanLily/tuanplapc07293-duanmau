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