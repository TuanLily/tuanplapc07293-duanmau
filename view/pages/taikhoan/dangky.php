<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title">Đăng ký thành viên</div>
            <div class="row_main box-content form_tai_khoan">
                <form action="index.php?act=dangky" method="post">
                    <div class="row_main mb10">
                        Tên Tài Khoản: <br>
                        <input type="text" name="user">
                        <div class="thongbao">
                            <span>
                                <?php echo (isset($_SESSION['error']['user'])) ? $_SESSION['error']['user'] : '' ?>
                            </span>
                        </div>
                    </div>
                    <div class="row_main mb10">
                        Họ Và Tên: <br>
                        <input type="text" name="name">
                        <div class="thongbao">
                            <span>
                                <?php echo (isset($_SESSION['error']['name'])) ? $_SESSION['error']['name'] : '' ?>
                            </span>
                        </div>
                    </div>
                    <div class="row_main mb10">
                        Email: <br>
                        <input type="email" name="email">
                        <div class="thongbao">
                            <span>
                                <?php echo (isset($_SESSION['error']['email'])) ? $_SESSION['error']['email'] : '' ?>
                            </span>
                        </div>
                    </div>
                    <div class="row_main mb10">
                        Mật khẩu: <br>
                        <input type="password" name="pass" id="password">
                        <div id="toggle_pass" onclick="showPassword()"></div>
                        <div class="thongbao">
                            <span>
                                <?php echo (isset($_SESSION['error']['pass'])) ? $_SESSION['error']['pass'] : '' ?>
                            </span>
                        </div>
                    </div>
                    <div class="row_main mb10">
                        Xác nhận mật khẩu: <br>
                        <input type="password" name="rpass" id="rpassword">
                        <div id="toggle_rpass" onclick="showRPassword()"></div>
                        <div class="thongbao">
                            <span>
                                <?php echo (isset($_SESSION['error']['rpass'])) ? $_SESSION['error']['rpass'] : '' ?>
                            </span>
                        </div>
                    </div>
                    <div class="row_main mb10">
                        <input type="submit" value="Đăng ký" name="dangky">
                        <input type="reset" value="Nhập lại">
                    </div>

                </form>

                <h3 class="thongbao">
                    <?php

                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }

                    ?>
                </h3>
            </div>
        </div>
    </div>

    <div class="box-right">
        <?php require_once 'view/pages/aside.php'; ?>
    </div>
</div>

<script type="text/javascript">
    var password = document.getElementById('password');
    var rpassword = document.getElementById('rpassword');
    var toggle_pass = document.getElementById('toggle_pass');
    var toggle_rpass = document.getElementById('toggle_rpass');

    function showPassword() {
        if (password.type === 'password') {
            password.setAttribute('type', 'text');
            toggle_pass.classList.add('hide')
        } else {
            password.setAttribute('type', 'password');
            toggle_pass.classList.remove('hide')
        }
    }

    function showRPassword() {
        if (rpassword.type === 'password') {
            rpassword.setAttribute('type', 'text');
            toggle_rpass.classList.add('hide')
        } else {
            rpassword.setAttribute('type', 'password');
            toggle_rpass.classList.remove('hide')
        }
    }
</script>