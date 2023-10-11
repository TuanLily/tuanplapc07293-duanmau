<?php
/**
 * Thêm danh mục
 * @param mixed $tenloai
 * @return void
 */
function insert_danhmuc($tenloai)
{
    $sql = "insert into danhmuc(name) values('$tenloai')";
    pdo_execute($sql);
}

/**
 * Xóa danh mục
 * @param mixed $id
 * @return void
 */
function delete_danhmuc($id)
{
    $sql = "delete from danhmuc where id=" . $id;
    pdo_execute($sql);
}

/**
 * Hiển thị tất cả danh mục
 * @return array
 */
function loadall_danhmuc()
{
    $sql = "select * from danhmuc order by id asc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

/**
 * Hiển thị 1 danh mục
 * @param mixed $id
 * @return array
 */
function loadone_danhmuc($id)
{
    $sql = "select * from danhmuc where id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
/**
 * Sửa danh mục
 * @param mixed $id
 * @param mixed $tenloai
 * @return void
 */
function update_danhmuc($id, $tenloai)
{
    $sql = "update danhmuc set name='" . $tenloai . "' where id=" . $id;
    pdo_execute($sql);
}

function getDanhMuc_limit($start, $limit)
{

    $sql = "select * from danhmuc limit $start,$limit";
    $dm = pdo_query($sql);
    return $dm;
}


?>