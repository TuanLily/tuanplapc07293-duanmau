<?php
/**
 * Thêm sản phẩm
 * @param mixed $tenloai
 * @return void
 */
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm)
{
    $sql = "insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}

/**
 * Xóa sản phẩm
 * @param mixed $id
 * @return void
 */
function delete_sanpham($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}

/**
 * Hiển thị tất cả sản phẩm
 * @return array
 */
function loadall_sanpham($keyw = '', $iddm = 0)
{
    $sql = "select * from sanpham where 1";
    if ($keyw != "") {
        $sql .= " and name like '%" . $keyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm = '" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

/**
 * Hiển thị tất cả sản phẩm ra ngoài trang chủ với top 10 lượt xem
 * @return array
 */
function loadall_sanpham_top10()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
/**
 * Hiển thị tất cả sản phẩm ra ngoài trang chủ
 * @return array
 */
function loadall_sanpham_home()
{
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

/**
 * Hiển thị 1 sản phẩm
 * @param mixed $id
 * @return array
 */
function loadone_sanpham($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

/**
 * Load sản phẩm cùng loại
 * @param mixed $id
 * @return array
 */
function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm =" . $iddm . " and id <>" . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

/**
 * Hiển thị tên danh mục
 * @return array
 */
function load_ten_danhmuc($iddm)
{
    if ($iddm > 0) {
        $sql = "select * from danhmuc where id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}

/**
 * Sửa sản phẩm
 * @param mixed $id
 * @param mixed $tenloai
 * @return void
 */
function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh)
{
    if ($hinh != "") {
        $sql = "update sanpham set name='" . $tensp . "', price='" . $giasp . "',mota='" . $mota . "',img='" . $hinh . "', iddm='" . $iddm . "' where id=" . $id;
    } else {
        $sql = "update sanpham set name='" . $tensp . "', price='" . $giasp . "',mota='" . $mota . "', iddm='" . $iddm . "' where id=" . $id;
    }
    pdo_execute($sql);
}


function getProduct_limit($start, $limit)
{

    $sql = "select * from sanpham limit $start,$limit";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function update_luotxem($id)
{
    $one_sp = loadone_sanpham($id);


    if (isset($one_sp)) {
        $luotxem = $one_sp['luotxem'] + 1;
        $sql = "update sanpham set luotxem = '" . $luotxem . "' where id = '" . $id . "'";
    }
    pdo_execute($sql);
}

?>