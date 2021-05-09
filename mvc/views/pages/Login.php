<div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                    <h1 class="page-title">Đăng nhập</h1>
                    <ul class="breadcrumb">
                        <li><a href="home">Trang chủ</a></li>
                        <li class="current"><span>Đăng nhập</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content-wrapper">
    <div class="page-content-inner pt--75 pb--80">
        <div class="container">
            <div class="row justify-content-center">

                <!-- login -->
                <div class="col-md-6">
                    <div class="login-box">
                        <h3 class="heading__tertiary mb--30">Đăng nhập</h3>
                        <form class="form form--login" method="POST" id="form_login" name="form_login" action="./Login/loginPageController">
                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="login_username">Tên tài khoản <span class="required">*</span></label>
                                <input type="text" class="form__input form__input--2" id="login_username" name="login_username">
                            </div>
                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="login_password">Mật khẩu <span class="required">*</span></label>
                                <input type="password" class="form__input form__input--2" id="login_password" name="login_password">
                            </div>
                            <p id="login_response"></p>
                            <div class="d-flex align-items-center mb--20">
                                <div class="form__group mr--30">
                                    <input type="submit" value="Đăng nhập" class="btn-submit" name="btnLogin" id="btnLogin">
                                </div>
                                <div class="form__group">
                                    <label class="form__label checkbox-label" for="store_session">
                                        <a class="forgot-pass" href="./admincp">Đăng nhập vào hệ thống admin</a>
                                    </label>
                                </div>
                            </div>
                            <a class="forgot-pass" href="./login/reset">Quên mật khẩu?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>