<!-- Main Content  -->
<div class="row_main mb ">
    <div class="box-left mr ">
        <div class="row_main mb">
            <div class="box-title">XÁC MINH TÀI KHOẢN</div>
            <div class="row_main box-content form_tai_khoan">

                <form action="index.php?act=xacminh" method="post">
                    <div class="row_main mb10">
                        Mã xác mình: <br>
                        <input type="text" name="maxm" id="maxm" placeholder="Nhập mã xác minh tại đây">
                        <div id="toggle_pass" onclick="showPassword()"></div>
                        <div class="thongbao">
                            <span>
                                <?php echo (isset($_SESSION['error']['maxm'])) ? $_SESSION['error']['maxm'] : '' ?>
                            </span>
                        </div>
                    </div>


                    <div class="row_main mb10">
                        <input type="submit" value="Xác Minh" name="xacminh">
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