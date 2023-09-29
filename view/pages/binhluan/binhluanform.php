<?php
    session_start();
    include "../../../dao/pdo.php";
    include "../../../dao/binhluan.php";
    $idpro = $_REQUEST['idpro'];
    $iduser = $_SESSION['user']['id'];

    $dsbl = loadall_binhluan($idpro);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/style.css">
</head>

<body>

    <div class="row_main mb">
        <div class="box-title">Bình luận</div>
        <div class="box-content2 binhluan">
            <table style="margin-left: 10px;">
                <?php
                
                    echo '<tr><td><strong>Nội dung bình luận</strong></td>';
                    echo '<td><strong>Mã khách hàng</strong></td>';
                    echo '<td><strong>Ngày bình luận</strong></td></tr>';
                    
                        foreach ($dsbl as $bl){
                            extract($bl);
                            echo '<tr><td>'.$noidung.'</td>';
                            echo '<td>'.$iduser.'</td>';
                            echo '<td>'.$ngaybinhluan.'</td></tr>';
                        }
                    ?>
            </table>

        </div>
        <div class="box-footer search_box">
            <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" placeholder="Nhập tin nhắn" name="noidung" class="mb10">
                <input type="submit" value="Gửi Bình Luận" name="guibinhluan">
            </form>
        </div>
    </div>


    <?php
    if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])){
        $noidung = $_POST['noidung'];
        $idpro = $_POST['idpro'];
        $iduser = $_SESSION['user']['id'];
        $ngaybinhluan = date('h:i:s d/m/Y');
        insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
        header("location: ".$_SERVER['HTTP_REFERER']);
    }

    
    ?>

</body>

</html>