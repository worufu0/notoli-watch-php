<?php
class Login extends Controller
{
    public $user;
    public function __construct()
    {
        $this->request = new Request();
        $this->UserModel = $this->model("UserModel");
    }
    public function Action()
    {
        if ($this->request->isPost("btnSubmit")) {
            $username = $this->request->getPost("username");
            $password = $this->request->getPost("password");
            $result = $this->UserModel->loginAdmin($username, $password);
            if ($result == "true") {
                $_SESSION['loggedINAdmin'] = '1';
                $_SESSION['username'] = $username;
            }
        }
        if (isset($_SESSION['loggedINAdmin'])) {
            $location = "./admincp";
            header("Location: " . $location);
            exit();
        }
        $this->view("LoginLayout", [
            "page" => "Login",
        ]);
    }
}
