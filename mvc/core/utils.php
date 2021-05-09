<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'config.php';
require APPLICATION_PATH . '/vendor/autoload.php';
function verification($register_email, $token)
{
  $mail = new PHPMailer(true);
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username = EMAIL_USER;
  $mail->Password = EMAIL_PASSWORD;                               // SMTP password

  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port       = 587;

  //Recipients
  $mail->setFrom('notolistore@gmail.com', 'Notoli Sneakers');
  $mail->addAddress($register_email);                   // Name is optional
  $mail->addReplyTo('notolistore@gmail.com', 'Notoli Sneakers');
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Verify Account NOTOLI';
  $mail->Body    = '<!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Document</title>
          </head>
          <body>
            <div class="wrapper">
              <p>
                Cảm ơn bạn đã thực hiện đăng kí tài khoản tại website
                NOTOLI.COM. Vui lòng truy cập vào link bên dưới để xác
                nhận tài khoản!
              </p>
              <a href="http://' . SERVER . '/notoli/register/verify/' . $token . '">Xác nhận tài khoản</a>
            </div>
          </body>
        </html>';
  $result = false;
  if ($mail->send()) {
    $result = true;
  }
  return json_encode($result);
}

function forgotPassword($register_email, $token)
{
  $mail = new PHPMailer(true);
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username = EMAIL_USER;
  $mail->Password = EMAIL_PASSWORD;                               // SMTP password

  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port       = 587;

  //Recipients
  $mail->setFrom('notolistore@gmail.com', 'Notoli Sneakers');
  $mail->addAddress($register_email);                   // Name is optional
  $mail->addReplyTo('notolistore@gmail.com', 'Notoli Sneakers');
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Forgot Password NOTOLI';
  $mail->Body    = '<!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Document</title>
        </head>
        <body>
          <div class="wrapper">
            <p>
            Chúng tôi nhận được yêu cầu thiết lập lại mật khẩu cho tài khoản NOTOLI của bạn.</br>
            Vui lòng thiết lập lại mật khẩu <a href="http://' . SERVER . '/notoli/login/reset/' . $token . '">Tại đây</a>
            </p>
            
          </div>
        </body>
      </html>';
  $result = false;
  if ($mail->send()) {
    $result = true;
  }
  return json_encode($result);
}

function isAdminPath()
{
  // $params = explode('/', APPLICATION_PATH);
  // $params = array_reverse($params);

  // Cách 2:
  $params = explode('/', $_SERVER["REQUEST_URI"]);
  $params = array_reverse($params);
  if (isset($params[1]) && $params[1] == 'admincp') {
    return true;
  }
  return false;
}
