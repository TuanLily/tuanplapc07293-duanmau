<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main">
            <div class="banner">
                <!-- Banner  -->
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/Sliding%20iPhone%2015.png"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/sliding-tv-tcl-th9-0013.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/sliding-fold-th9-ver1.png"
                                class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row_main">
            <?php
                $i = 0;
                foreach ($sanphamnew as $sp){
                    extract($sp);
                    $linksp= "index.php?act=sanphamct&idsp=".$id;
                    $hinh = $img_path.$img;
                    if(($i==2) || ($i==5) || ($i==8)){
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
    <div class="box-right">
        <?php include 'pages/aside.php';?>
    </div>
</div>