<?php
/**
 * Thêm tài khoản
 * @param mixed $tenloai
 * @return void
 */
function insert_taikhoan($email, $user, $name, $pass)
{
    $sql = "insert into taikhoan(email, user, name, pass) values('$email', '$user', '$name', '$pass')";
    pdo_execute($sql);
}


/**
 * Kiểm tra thông tin tài khoản
 * @param mixed $id
 * @return array
 */
function check_user($user, $pass)
{
    $sql = "select * from taikhoan where user='" . $user . "' and pass='" . $pass . "'";
    $tk = pdo_query_one($sql);
    return $tk;
}

function check_user_validate($user)
{
    $sql = "select * from taikhoan where user='" . $user . "' ";
    $tk = pdo_query_one($sql);
    return $tk;
}

/**
 * Cập nhật tài khoản
 * @param mixed $id
 * @param mixed $user
 * @param mixed $pass
 * @param mixed $email
 * @param mixed $address
 * @param mixed $tel
 * @return void
 */
function capnhat_taikhoan($id, $user, $name, $pass, $email, $address, $tel)
{
    try {
        $sql = "update taikhoan set user = '" . $user . "', name = '" . $name . "', pass ='" . $pass . "', email = '" . $email . "', address = '" . $address . "', tel = '" . $tel . "' where id=" . $id;
        pdo_execute($sql);
        return 1;
    } catch (Exception $e) {
        echo $e;
        return 0;
    }

}


/**
 * Kiểm tra thông tin tài khoản
 * @param mixed $id
 * @return array
 */
function check_email($email)
{
    $sql = "select * from taikhoan where email='" . $email . "' ";
    $tk = pdo_query_one($sql);
    return $tk;
}

function update_password($email, $pass)
{
    $sql = "update taikhoan set pass='" . $pass . "' where email='" . $email . "' ";
    pdo_execute($sql);
}

/**
 * Hiển thị tất cả tài khoản
 * @return array
 */
function loadall_taikhoan()
{
    $sql = "select * from taikhoan order by id desc";
    $listaikhoan = pdo_query($sql);
    return $listaikhoan;
}


/**
 * Xóa tài khoản
 * @param mixed $id
 * @return void
 */
function delete_taikhoan($id)
{
    $sql = "delete from taikhoan where id=" . $id;
    pdo_execute($sql);
}


/**
 * Hiển thị 1 tài khoản
 * @param mixed $id
 * @return array
 */
function loadone_taikhoan($id)
{
    $sql = "select * from taikhoan where id=" . $id;
    $tk = pdo_query_one($sql);
    return $tk;
}

/**
 * Mã hóa md5
 * @param mixed $password
 * @return string
 */
function md5_encrypt($password)
{
    return md5($password);
}

function get_password_hash($pass)
{
    // Kết nối với cơ sở dữ liệu
    $conn = mysqli_connect('localhost', 'root', 'mysql', 'duanmaufall2023');

    // Thực hiện câu lệnh SQL để lấy mật khẩu được lưu trữ trong cơ sở dữ liệu
    $sql = "SELECT password FROM taikhoan WHERE pass = '$pass'";
    $result = mysqli_query($conn, $sql);

    // Nếu có kết quả, lấy mật khẩu và trả về
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $pass_hash = $row['pass'];
        return $pass_hash;
    } else {
        // Nếu không có kết quả, trả về null
        return null;
    }
}
?>