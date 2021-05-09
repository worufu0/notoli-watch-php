<?php
class OrderControl extends Controller
{
    public $prod;
    public $request;
    public function __construct()
    {
        $this->request = new Request();
        $this->prod = $this->model("productModel");
    }

    public function Action()
    {
        if (!isset($_SESSION['loggedINAdmin'])) {
            $location = "./login";
            header("Location: " . $location);
            exit();
        }
        $this->view("AdminLayout", [
            "page" => "OrderControl",
            "listUser" => $this->prod->ShowUser(),
            "listProd" => $this->prod->Product(),
        ]);
    }
}
