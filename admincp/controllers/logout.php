<?php
class Logout extends Controller
{
    public function __construct()
    {
        // Khởi tạo model;
    }
    public function Action()
    {
        if (isset($_SESSION['loggedINAdmin'])) {
            unset($_SESSION['loggedINAdmin']);
            unset($_SESSION['username']);
        }
        if (!isset($_SESSION['loggedINAdmin'])) {
            $location = "./login";
            header("Location: " . $location);
            exit();
        }
    }
}
