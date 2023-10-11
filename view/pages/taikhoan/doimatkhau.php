<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title">ĐẶT LẠI MẬT KHẨU</div>
            <div class="row_main box-content form_tai_khoan">

                <form action="index.php?act=doimk" method="post">
                    <div class="row_main mb10">
                        Mật khẩu mới: <br>
                        <input type="password" name="pass" id="password" placeholder="Nhập mật khẩu">
                        <div id="toggle_pass" onclick="showPassword()"></div>
                        <div class="thongbao">
                            <span>
                                <?php echo (isset($_SESSION['error']['pass'])) ? $_SESSION['error']['pass'] : '' ?>
                            </span>
                        </div>
                    </div>
                    <div class="row_main mb10">
                        Xác nhận mật khẩu: <br>
                        <input type="password" name="rpass" id="rpassword" placeholder="Nhập mật khẩu xác nhận">
                        <div id="toggle_rpass" onclick="showRPassword()"></div>
                        <div class="thongbao">
                            <span>
                                <?php echo (isset($_SESSION['error']['rpass'])) ? $_SESSION['error']['rpass'] : '' ?>
                            </span>
                        </div>
                    </div>

                    <div class="row_main mb10">
                        <input type="submit" value="Xác nhận" name="doimatkhau">
                        <input type="reset" value="Nhập lại">
                    </div>

                </form>

                <h4 class="thongbao">
                    <?php

                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }

                    ?>
                </h4>
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