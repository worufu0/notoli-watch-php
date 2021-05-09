<?php
class Login extends Controller {
    public $UserModel;
    public $CartModel;
    public function __construct() {
        // Khởi tạo UserModel
        $this->UserModel = $this->model("UserModel");
        // Khởi tạo CartModel
        $this->CartModel = $this->model("CartModel");

        $this->prod = $this->model("productModel");
    }
    public function Action() {
        if(isset($_SESSION['loggedIN'])) {
            $location = "./";
            header("Location: " . $location);
            exit();
        }
        $this->view("MiniLayout", [
            "page"=>"Login",
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
            "listCategories"=>$this->prod->ShowListCategories(),
            //Lấy danh sách nhà sản xuất (Rolex, Apple)
            "listBrands"=>$this->prod->ShowListBrand(),
        ]);
    }
    public function loginPageController() {
        if(isset($_POST['login'])) {
            $username = $this->UserModel->con->real_escape_string($_POST["usernamePHP"]);
            $password = $this->UserModel->con->real_escape_string($_POST["passwordPHP"]);
            $userID = $this->CartModel->GetUserID($username);
            $result = $this->UserModel->loginPageModel($username, $password);
            //echo $result;
            if($result == "true") {
                $_SESSION['loggedIN'] = '1';
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = json_decode($userID);
                echo $result;
            } else {
                echo $result;
            }
        } else {
            $this->view("MiniLayout", [
                "page"=>"404",
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories"=>$this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands"=>$this->prod->ShowListBrand(),
            ]);
        }
    }

        // public function loginPageController() {
        // if(isset($_POST['btnLogin'])) {
        //     $username = $this->UserModel->con->real_escape_string($_POST["login_username"]);
        //     $password = $this->UserModel->con->real_escape_string($_POST["login_password"]);
        //     $result = $this->UserModel->loginPageModel($username, $password);
        //     if($result == "true") {
        //         $location = "../";
        //         header("Location: " . $location);
        //         exit;
        //     }
        // }
        //}

        
    //================================== Start quên mật khẩu ==========================================
    public function reset($token=NULL) {
        if(isset($_SESSION['loggedIN'])) {
            $location = "../";
            header("Location: " . $location);
        }
        if($token == NULL) {
            $this->view("MiniLayout", [
                "page"=>"Reset",
                "case"=>"true",
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories"=>$this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands"=>$this->prod->ShowListBrand(),
            ]);
        } else {
            $explodeToken = explode("-", $token);
            $checkToken = $explodeToken[0];
            $resultToken = $this->UserModel->checkToken($checkToken);
            if($resultToken == "true") {
                $this->view("MiniLayout", [
                    "page"=>"Reset",
                    "case"=>"false",
                    "token"=>$token,
                    //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                    "listCategories"=>$this->prod->ShowListCategories(),
                    //Lấy danh sách nhà sản xuất (Rolex, Apple)
                    "listBrands"=>$this->prod->ShowListBrand(),
                ]);
            } else {
                $this->view("MiniLayout", [
                    "page"=>"404",
                    //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                    "listCategories"=>$this->prod->ShowListCategories(),
                    //Lấy danh sách nhà sản xuất (Rolex, Apple)
                    "listBrands"=>$this->prod->ShowListBrand(),
                ]);
            }
        }
    }
    public function sendMail() {      
        if(!empty($_POST)) {
            $recover_email = $this->UserModel->con->real_escape_string($_POST["recover_email"]);
            //Lọc thông tin đăng kí
            if(empty($recover_email)) {
                exit("false");
                //return;
            }
            //Kiểm tra email đã đăng kí chưa
            $checkEmail = $this->UserModel->checkEmail($recover_email);
            if($checkEmail == "true") {
                $token = $this->UserModel->SelectToken($recover_email);
                $token = json_decode($token);
                $token = $token . "-" . $recover_email;
                $resultSendMail = forgotPassword($recover_email, $token);
                if($resultSendMail) {
                    exit("true");
                } else {
                    exit("false");
                }
            }
        } else {
            $this->view("MiniLayout", [
                "page"=>"404",
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories"=>$this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands"=>$this->prod->ShowListBrand(),
            ]);
        }
    }

    public function ChangePassword() {
        if(!empty($_POST)) {      
            $change_password = $this->UserModel->con->real_escape_string($_POST["recover_password"]);
            $change_password_2 = $this->UserModel->con->real_escape_string($_POST["recover_password_2"]);
            $change_token = $this->UserModel->con->real_escape_string($_POST["token_change"]);
            $change = explode("-", $change_token);
            $token = $change[0];
            $newToken = bin2hex(random_bytes(50));
            $email = $change[1];

            //Lọc thông tin đăng kí
            if(empty($change_password) || empty($change_password_2)) {
                exit("false");
            }
            if($change_password !== $change_password_2) {
                exit("false");
            }
            //Kiểm tra email đã đăng kí chưa
            $change_password = password_hash($change_password, PASSWORD_DEFAULT);
            $resultUpdatePassword = $this->UserModel->UpdatePassword($email, $change_password, $token, $newToken);
            if($resultUpdatePassword == "true") {
                exit("true");
            } else {
                exit("false");
            }
        } else {
            $this->view("MiniLayout", [
                "page"=>"404",
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories"=>$this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands"=>$this->prod->ShowListBrand(),
            ]);
        }
    }
    //========================================End Quên mật khẩu=============================================
}
?>