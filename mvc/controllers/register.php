<?php
class Register extends Controller
{
    public $UserModel;
    public function __construct()
    {
        // Khởi tạo model
        $this->UserModel = $this->model("UserModel");

        $this->prod = $this->model("productModel");
    }
    public function Action()
    {
        if (isset($_SESSION['loggedIN'])) {
            $location = DOMAIN;
            header("Location: " . $location);
            exit();
        }
        $this->view("MiniLayout", [
            "page" => "Register",
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
            "listCategories" => $this->prod->ShowListCategories(),
            //Lấy danh sách nhà sản xuất (Rolex, Apple)
            "listBrands" => $this->prod->ShowListBrand(),
            //Lấy danh sách tỉnh thành
            "listProvince" => $this->UserModel->ShowListProvince(),
        ]);
    }
    public function Verify($token = NULL)
    {
        if (isset($_SESSION['loggedIN'])) {
            $location = DOMAIN;
            header("Location: " . $location);
            exit();
        }
        if ($token != NULL) {
            $newToken = bin2hex(random_bytes(50));
            $result = $this->UserModel->VerifyNewUser($token, $newToken);
            if ($result == 'true') {
                $this->view("MiniLayout", [
                    "page" => "Verify",
                    "result" => $result,
                    //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                    "listCategories" => $this->prod->ShowListCategories(),
                    //Lấy danh sách nhà sản xuất (Rolex, Apple)
                    "listBrands" => $this->prod->ShowListBrand(),
                ]);
            } else {
                $this->view("MiniLayout", [
                    "page" => "404",
                    //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                    "listCategories" => $this->prod->ShowListCategories(),
                    //Lấy danh sách nhà sản xuất (Rolex, Apple)
                    "listBrands" => $this->prod->ShowListBrand(),
                ]);
            }
        } else {
            $this->view("MiniLayout", [
                "page" => "404",
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories" => $this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands" => $this->prod->ShowListBrand(),
            ]);
        }
    }
    ////////////    AJAX     //////////////
    //Kiểm tra tài khoản có tồn tại không
    public function checkUsername()
    {
        //Lấy tên username;
        $username = $_POST["username"];
        //Trả về kết quả về cho client;
        echo $this->UserModel->checkUsername($username);
    }
    //Kiểm tra email có tồn tại không
    public function checkEmail()
    {
        //Lấy tên username;
        $email = $_POST["email"];
        //Trả về kết quả về cho client;
        echo $this->UserModel->checkEmail($email);
    }
    //Đăng kí tài khoản
    public function registerAccount()
    {
        if (!empty($_POST)) {
            if ($_SESSION["CODE"] != $_POST["register_captcha"]) {
                exit("false");
            }
            $register_fullname = $this->UserModel->con->real_escape_string($_POST["register_fullname"]);
            $register_birthday = $this->UserModel->con->real_escape_string($_POST["register_birthday"]);
            $register_city = $this->UserModel->con->real_escape_string($_POST["register_city"]);
            $register_username = $this->UserModel->con->real_escape_string($_POST["register_username"]);
            $register_password = $this->UserModel->con->real_escape_string($_POST["register_password"]);
            $register_email = $this->UserModel->con->real_escape_string($_POST["register_email"]);
            $register_role = "Customer";
            if ($register_birthday == '') {
                $register_birthday = '00-00-0000';
            }
            //exit("false");
            //Lọc thông tin đăng kí
            if (empty($register_username) || empty($register_password) || empty($register_email)) {
                exit("false");
            }
            //Kiểm tra username đã đăng kí chưa
            $checkUsername = $this->UserModel->checkUsername($register_username);
            if ($checkUsername == "true") {
                exit("false");
            }
            //Kiểm tra email đã đăng kí chưa
            $checkEmail = $this->UserModel->checkEmail($register_email);
            if ($checkEmail == "true") {
                exit("false");
            }
            //Đăng kí tài khoản
            $register_password = password_hash($register_password, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(50));
            $resultInsert = $this->UserModel->InsertNewUser($register_fullname, $register_birthday, $register_city, $register_username, $register_password, $register_role, $register_email, $token, 0);
            if ($resultInsert == "true") {
                //Gửi email xác nhận
                $resultVerify = verification($register_email, $token);
                if ($resultVerify) {
                    exit("true");
                } else {
                    exit("false");
                }
            }
        } else {
            $location = DOMAIN . '/register';
            header("Location: " . $location);
        }
    }
}
