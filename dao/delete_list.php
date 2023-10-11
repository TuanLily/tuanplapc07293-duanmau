<?php
function RemoveSelect_sp($del)
{
    $sql = "DELETE FROM sanpham where id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_dm($del)
{
    $sql = "DELETE FROM danhmuc where id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_taikhoan($del)
{
    $sql = "DELETE FROM taikhoan where id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_bl($del)
{
    $sql = "DELETE FROM binhluan where id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_thongke($del)
{
    $sql = "DELETE FROM thongke where id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_bill($del)
{
    $sql = "DELETE FROM bill where id in ($del)";
    pdo_execute($sql);
}
?>