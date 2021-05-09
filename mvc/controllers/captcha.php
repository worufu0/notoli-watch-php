<?php
class Captcha extends Controller {
    public function Action() {
        $codigoCaptcha = substr(md5(time()) ,0, 8);
        $_SESSION['CODE'] = $codigoCaptcha;
        $imagemCaptcha = imagecreatefrompng("public/assets/img/fundocaptch.png");
        $fonteCaptcha = imageloadfont("public/assets/fonts/captcha/anonymous.gdf");
        $corCaptcha = imagecolorallocate($imagemCaptcha, 0,98,215);
        imagestring($imagemCaptcha, $fonteCaptcha, 15, 5, $codigoCaptcha, $corCaptcha);
        header('Content-Type:image/png');
        imagepng($imagemCaptcha);
        imagedestroy($imagemCaptcha);
    }
    public function checkCaptcha() {
        if($_POST['register_captcha'] == $_SESSION['CODE']) {
            exit("true");
        } else {
            exit("false");
        }
    }
}
