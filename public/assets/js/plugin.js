function disableScreen() {
  var screenLock = $("#screen_lock");
  screenLock.addClass("overlay");
}
function enableScreen() {
  var screenLock = $("#screen_lock");
  screenLock.removeClass("overlay");
}

function rulePassword(val, messagePassword) {
  // var val = $("#register_password").val();
  // var messagePassword = $("#message_password");
  var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})/;
  if (regex.test(val)) {
    messagePassword.html("Mật khẩu hợp lệ");
    messagePassword.addClass("text-success");
    messagePassword.removeClass("text-warning");
    rule_password = true;
  } else {
    messagePassword.html(
      "Mật khẩu tối thiểu 8 kí tự và gồm cả chữ thường, chữ hoa, số và kí tự đặc biệt"
    );
    messagePassword.addClass("text-warning");
    messagePassword.removeClass("text-success");
    rule_password = false;
  }
  return rule_password;
}

// Bắt đầu đoạn code chức năng captcha
// == Hàm sử dụng ajax gửi mã client nhập về server kiểm tra
function ruleCaptcha() {
  var messageCaptcha = $("#message_captcha");
  var result;
  $.ajax({
    url: "./captcha/checkCaptcha",
    data: $("#registration-form").serialize(),
    type: "POST",
    async: false,
    success: function (res) {
      if (jQuery.trim(res) == "true") {
        messageCaptcha.removeClass("text-danger");
        messageCaptcha.addClass("text-success");
        messageCaptcha.last().html("Captcha chính xác");
        result = true;
      } else {
        messageCaptcha.removeClass("text-success");
        messageCaptcha.addClass("text-danger");
        messageCaptcha.last().html("Captcha không chính xác");
        result = false;
      }
    },
  });
  return result;
}
// == Hàm thực hiện kiểm tra captcha mỗi khi bỏ focus khỏi input
$(document).ready(function () {
  $("#register_captcha").focusout(function () {
    ruleCaptcha();
  });
});
// == Hàm thực hiện kiểm tra captcha mỗi khi bấm button register
$(document).ready(function () {
  $("#img-captcha").click(function () {
    $("#img-captcha").attr("src", "captcha");
    return false;
  });
});
// Kết thúc đoạn code chức năng captcha

//Register Validation
$(document).ready(function () {
  var rule_email = false;
  var rule_username = false;
  var rule_password = false;
  //Submit register
  $("form#registration-form").on("submit", function (e) {
    var loadingElement = $("div.zakas-preloader");
    var messageResult = $("#message_result");
    loadingElement.addClass("active");
    $.ajax({
      url: "./register/registerAccount",
      data: $(this).serialize(),
      type: "POST",
      success: function (res) {
        console.log(res);
        if (jQuery.trim(res) == "true") {
          messageResult.removeClass("text-danger");
          messageResult.addClass("text-success");
          messageResult
            .last()
            .html("Đăng ký tài khoản thành công, vui lòng xác nhận email");
          $("#register_username").val("");
          $("#register_password").val("");
          $("#register_email").val("");
          $("#register_captcha").val("");
          $("#message_username").html("");
          $("#message_password").html("");
          $("#message_email").html("");
          $("#message_captcha").html("");
        } else {
          messageResult.removeClass("text-success");
          messageResult.addClass("text-danger");
          messageResult
            .last()
            .html("Đăng ký tài khoản thất bại, vui lòng thử lại");
        }
        setTimeout(function () {
          loadingElement.removeClass("active");
        }, 500);
      },
    });
    return false;
  });
  //Check username
  $("#register_username").focusout(function () {
    ruleUsername();
  });
  function ruleUsername() {
    var user = $("#register_username").val();
    var messageUsername = $("#message_username");
    $.post("./register/checkUsername", { username: user }, function (data) {
      if (data == "true") {
        messageUsername.html("Tài khoản đã tồn tại trong hệ thống");
        messageUsername.addClass("text-danger");
        messageUsername.removeClass("text-success");
        messageUsername.removeClass("text-warning");
        rule_username = false;
      } else {
        var regex = /^([a-zA-Z0-9_.+-])(?=.{5,})/;
        if (regex.test(user)) {
          messageUsername.html("Tài khoản hợp lệ");
          messageUsername.addClass("text-success");
          messageUsername.removeClass("text-warning");
          messageUsername.removeClass("text-danger");
          rule_username = true;
        } else {
          messageUsername.html(
            "Tài khoản tối thiểu 6 (yêu cầu không có khoảng cách và kí tự đặc biệt)"
          );
          messageUsername.addClass("text-warning");
          messageUsername.removeClass("text-success");
          messageUsername.removeClass("text-danger");
          rule_username = false;
        }
      }
    });
    return rule_username;
  }
  $("#register_password").focusout(function () {
    var val = $("#register_password").val();
    var messagePassword = $("#message_password");
    rulePassword(val, messagePassword);
  });
  $("#register_retypePassword").focusout(function () {
    var password = $("#register_password").val();
    var retypePassword = $("#register_retypePassword").val();
    var messageRetypePassword = $("#message_retypePassword");
    if (!retypePassword.trim()) {
      return false;
    } else if (password == retypePassword) {
      messageRetypePassword.html("Mật khẩu nhập lại hợp lệ");
      messageRetypePassword.addClass("text-success");
      messageRetypePassword.removeClass("text-warning");
      return true;
    }
    messageRetypePassword.html("Mật khẩu nhập lại không hợp lại");
    messageRetypePassword.removeClass("text-success");
    messageRetypePassword.addClass("text-warning");
    return false;
  });
  $("#register_email").focusout(function () {
    ruleEmail2();
  });

  function ruleEmail() {
    var val = $("#register_email").val();
    var messageEmail = $("#message_email");
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (regex.test(val)) {
      messageEmail.html("Email hợp lệ");
      messageEmail.addClass("text-success");
      messageEmail.removeClass("text-warning");
      rule_email = true;
    } else {
      messageEmail.html("Email không hợp lệ");
      messageEmail.addClass("text-warning");
      messageEmail.removeClass("text-success");
      rule_email = false;
    }
  }
  function ruleEmail2() {
    var val = $("#register_email").val();
    var messageEmail = $("#message_email");
    $.post("./register/checkEmail", { email: val }, function (data) {
      if (data == "true") {
        messageEmail.html("Email đã được đăng kí bởi 1 tài khoản khác");
        messageEmail.addClass("text-danger");
        messageEmail.removeClass("text-success");
        messageEmail.removeClass("text-warning");
        rule_email = false;
      } else {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (regex.test(val)) {
          messageEmail.html("Email hợp lệ");
          messageEmail.addClass("text-success");
          messageEmail.removeClass("text-warning");
          messageEmail.removeClass("text-danger");
          rule_email = true;
        } else {
          messageEmail.html("Email không hợp lệ");
          messageEmail.addClass("text-warning");
          messageEmail.removeClass("text-success");
          messageEmail.removeClass("text-danger");
          rule_email = false;
        }
      }
    });
    return rule_email;
  }
  $("#btnRegister").click(function () {
    var val = $("#register_password").val();
    var messagePassword = $("#message_password");
    rule_username = ruleUsername();
    rule_password = rulePassword(val, messagePassword);
    rule_email = ruleEmail2();
    var rule_captcha = ruleCaptcha();
    console.log(rule_captcha);
    console.log(rule_username);
    console.log(rule_password);
    console.log(rule_email);
    if (rule_username && rule_password && rule_email && ruleCaptcha) {
      return true;
    }
    $(".popup_box").css("display", "block");
    disableScreen();
    $("#btn-close").click(function () {
      $(".popup_box").css("display", "none");
      enableScreen();
    });
    return false;
  });
});
/*Login*/
$(document).ready(function () {
  $("#btnLogin").on("click", function () {
    var username = $("#login_username").val();
    var password = $("#login_password").val();
    if (username == "" || password == "") {
      $(".popup_box").css("display", "block");
      disableScreen();
      $("#btn-close").click(function () {
        $(".popup_box").css("display", "none");
        enableScreen();
      });
      return false;
    }
    var loadingElement = $("div.zakas-preloader");
    loadingElement.addClass("active");
    $.ajax({
      url: "./login/loginPageController",
      method: "POST",
      data: {
        login: 1,
        usernamePHP: username,
        passwordPHP: password,
      },
      success: function (response) {
        var loginResponse = $("#login_response");
        if (response == "true") {
          window.location.href = "./";
        } else {
          loginResponse.html("Tên đăng nhập hoặc mật khẩu không chính xác!");
          loginResponse.addClass("text-danger");
        }
        setTimeout(function () {
          loadingElement.removeClass("active");
        }, 1000);
      },
      dataType: "text",
    });
    return false;
  });
});
//Send mail khôi phục mật khẩu

$(document).ready(function () {
  $("form#sendMail-form").on("submit", function (e) {
    var loadingElement = $("div.zakas-preloader");
    var messageResult = $("#message_recover_result");
    loadingElement.addClass("active");
    $.ajax({
      url: "./login/sendMail",
      data: $(this).serialize(),
      type: "POST",
      success: function (res) {
        console.log(res);
        if (jQuery.trim(res) == "true") {
          messageResult.removeClass("text-danger");
          messageResult.addClass("text-success");
          messageResult
            .last()
            .html(
              "Mã xác minh đã được gửi đến địa chỉ email đăng kí. Vui lòng xác minh"
            );
        } else {
          messageResult.removeClass("text-success");
          messageResult.addClass("text-danger");
          messageResult.last().html("Email không tồn tại");
        }
        setTimeout(function () {
          loadingElement.removeClass("active");
        }, 500);
      },
    });
    return false;
  });
});

$(document).ready(function () {
  $("#recover_password").focusout(function () {
    var val = $("#recover_password").val();
    var messagePassword = $("#message_recover_password");
    rulePassword(val, messagePassword);
  });
  $("#recover_password_2").focusout(function () {
    var newPass = $("#recover_password").val();
    var rePass = $("#recover_password_2").val();
    var messagePassword2 = $("#message_recover_password_2");
    rulePassword(rePass, messagePassword2);
    if (newPass === rePass) {
      messagePassword2.html("Mật khẩu hợp lệ");
      messagePassword2.addClass("text-success");
      messagePassword2.removeClass("text-warning");
    } else {
      messagePassword2.html("Mật khẩu không giống nhau");
      messagePassword2.removeClass("text-success");
      messagePassword2.addClass("text-warning");
    }
  });
});

$(document).ready(function () {
  $("form#newPassword-form").on("submit", function (e) {
    var loadingElement = $("div.zakas-preloader");
    var messageChange = $("#message_change_password");
    loadingElement.addClass("active");
    $.ajax({
      url: "./login/ChangePassword",
      data: $(this).serialize(),
      type: "POST",
      success: function (res) {
        if (jQuery.trim(res) == "true") {
          messageChange.removeClass("text-danger");
          messageChange.addClass("text-success");
          messageChange.last().html("Đổi mật khẩu thành công");
        } else {
          messageChange.removeClass("text-success");
          messageChange.addClass("text-danger");
          messageChange.last().html("Đổi mật khẩu thất bại");
        }
        setTimeout(function () {
          loadingElement.removeClass("active");
        }, 500);
      },
    });
    return false;
  });
});
