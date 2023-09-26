<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title">Sản Phẩm <strong><?= $tendm ?></strong></div>
            <div class="row_main box-content">
                <?php
                    
                        $i = 0;
                        foreach ($dssp as $sp){
                            extract($sp);
                            $linksp= "index.php?act=sanphamct&idsp=".$id;
                            $hinh = $img_path.$img;
                            if(($i==2) || ($i==5) || ($i==8) || ($i==11
                            )){
                                $mr = "";
                            }else{
                                $mr="mr";
                            }
                            echo '
                            <div class="card '.$mr.'">
                                <div class="row_main img">
                                    <a href="'.$linksp.'">
                                    <img src="'.$hinh.'" class="card-img-top" alt="IMG" >
                                    </a>                            
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">'.$name.'</h5>
                                    <a href="'.$linksp.'" class="btn btn-light">'.$price.'$</a>
                                    <p class="card-text">'.$mota.'</p>
                                </div>
                            </div>
                            ';
                            $i += 1;
                             } 
                                       
                ?>
            </div>
        </div>
    </div>

    <div class="box-right">
        <?php require_once 'aside.php'; ?>
    </div>
</div>