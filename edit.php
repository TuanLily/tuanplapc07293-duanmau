<?php

require "dao/pdo.php";
require "dao/loaihang.php";

    if(isset($_POST['maLoai'])){
        loai_update($_POST['maLoai'],$_POST['tenLoai']);
        header('location: demo.php');
    }

    if(isset($_GET['maLoai'])){
        $maLoai = $_GET['maLoai'];
        $infoLoai = loaiHang_getinfo($maLoai);
        extract($infoLoai);
    
?>


<form action="edit.php" method="post">
    <input type="text" name="tenLoai" value="<?=$tenLoai?>">
    <br>
    <input type="hidden" name="maLoai" value="<?=$maLoai?>">
    <input type="submit" value="Cập nhật">
</form>

<?php }else{
    echo "mã loại không tồn tại";
}?>