<?php
class Logout extends Controller {
    public $UserModel;
    public function __construct() {
        // Khởi tạo model
        $this->UserModel = $this->model("UserModel");
    }
    public function Action() {
        if(isset($_SESSION['loggedIN'])) {
            unset($_SESSION['loggedIN']);
            unset($_SESSION['userID']);
        }
        if(!isset($_SESSION['loggedIN'])) {
            $location = "./login";
            header("Location: " . $location);
            exit();
        }
    }
}
?>