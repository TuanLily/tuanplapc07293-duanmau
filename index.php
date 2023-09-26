<?php
    include 'view/header.php';
    include 'dao/pdo.php';
    include 'dao/danhmuc.php';
    include 'dao/sanpham.php';
    include 'global.php';
    
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
                if((isset($_GET['iddm']) && $_GET['iddm']>0)){
                    $iddm = $_GET['iddm'];
                    $dssp = loadall_sanpham("",$iddm);
                    $tendm = load_ten_danhmuc($iddm);
                include 'view/pages/sanpham.php';
                }else{
                include 'view/home.php';
                }
            
            break;
            
            default:
                include 'view/home.php';
                break;
        }
    }else{
         include 'view/home.php';
    }
    include 'view/footer.php';

?>