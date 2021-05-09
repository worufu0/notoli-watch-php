<div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                    <h1 class="page-title">Khôi phục mật khẩu</h1>
                    <ul class="breadcrumb">
                        <li><a href="home">Trang chủ</a></li>
                        <li class="current"><span>Khôi phục mật khẩu</span></li>
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
                        <h4 class="heading__tertiary mb--30">Khôi phục mật khẩu</h4>
                        <p>Quên mật khẩu? Vui lòng nhập địa chỉ email. Bạn sẽ nhận được một liên kết tạo mật khẩu mới
                            qua email.</p>
                        <?php if($data["case"]=="true") { ?>
                        <form class="form form--login" id="sendMail-form" action="" method="POST">
                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="recover_email">Email khôi phục <span
                                        class="required">*</span></label>
                                <span class="message"><i id="message_recover_email"></i></span>
                                <input type="email" class="form__input form__input--2" id="recover _email"
                                    name="recover_email">
                            </div>
                            <p id="message_recover_result"></p>
                            <!-- <p class="privacy-text mb--20">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p> -->
                            <div class="form__group">
                                <input type="submit" id="btnRecover" name="btnRecover" value="Gửi"
                                    class="btn btn-submit btn-style-1">
                            </div>
                        </form>
                        <?php } else { ?>
                        <form class="form form--login" id="newPassword-form" action="" method="POST">
                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="recover_password">Mật khẩu mới <span
                                        class="required">*</span></label>
                                <div class="message"><i id="message_recover_password"></i></div>

                                <input type="password" class="form__input form__input--2" id="recover_password"
                                    name="recover_password">
                                <input type="text" class="form__input form__input--2 hidden-token" id="token_change"
                                    name="token_change" value=<?php echo $data["token"] ?>>
                            </div>

                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="recover_password_2">Nhập lại mật khẩu mới
                                    <span class="required">*</span></label>
                                <div class="message"><i id="message_recover_password_2"></i></div>
                                <input type="password" class="form__input form__input--2" id="recover_password_2"
                                    name="recover_password_2">
                            </div>
                            <p id="message_change_password"></p>
                            <div class="form__group">
                                <input type="submit" id="btnRecover" name="btnRecover" value="Xác nhận"
                                    class="btn btn-submit btn-style-1">
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>