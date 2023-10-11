<?php
global $connect;
$listsp = mysqli_query($connect, "SELECT * FROM sanpham");

//Tổng các bảng ghi
$total = mysqli_num_rows($listsp);

//Giới hạn hiển thị
$limit = 9;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;

$listsp_limit = getProduct_limit($start, $limit);

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $sanphamnew = $listsp_limit;
}
?>


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
            foreach ($sanphamnew as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $hinh = $img_path . $img;
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                echo '
                    <div class="card ' . $mr . '">
                        <div class="row_main img">
                            <a href="' . $linksp . '">
                            <img src="' . $hinh . '" class="card-img-top" alt="IMG" >
                            </a>                            
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="text-align:center;">' . $name . '</h5>
                            <p class="card-price">Giá: $' . number_format($price, 0, ',', '.') . '</p>
                        </div>
                        <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="id" value="' . $id . '">
                            <input type="hidden" name="name" value="' . $name . '">
                            <input type="hidden" name="img" value="' . $img . '">
                            <input type="hidden" name="price" value="' . $price . '">
                            <input type="submit" name="addtocart" class="btn btn-success add_cart" value="Thêm giỏ hàng">
                        </form>
                    </div>
                    ';
                $i += 1;
            }
            ?>
        </div>

        <!-- Phân trang -->
        <div class="box">
            <div class="first_line"></div>
            <p>Trang</p>
            <div class="second_line"></div>
        </div>
        <div class="pag">
            <nav aria-label="Page navigation example" class="pag">
                <ul class="pagination">
                    <li class="page-item <?php echo (($cr_page - 1 == 0) ? 'check' : '') ?>">
                        <a class="page-link" href="index.php?page=<?= $cr_page - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_page; $i++): ?>
                    <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>"><a class="page-link"
                            href="index.php?page=<?= $i ?>">
                            <?= $i ?>
                        </a></li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo (($cr_page == $total_page) ? 'check' : '') ?>">
                        <a class="page-link" href="index.php?page=<?= $cr_page + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    <div class="box-right">
        <?php include 'pages/aside.php'; ?>
    </div>
</div>