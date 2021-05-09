<?php
class Product extends Controller
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
        if ($this->request->isPost('idDelProd')) {
            $valID = $this->request->getPost('idDelProd');
            $this->prod->DeleteProduct($valID);
        }
        if ($this->request->isQuery('search')) {
            $valSearch = $this->request->getQuery('search');
            $listProduct = $this->prod->SearchProductAdmin($valSearch);
        } else {
            $listProduct = $this->prod->ShowProductBasic();
        }
        $this->view("AdminLayout", [
            "page" => "Product",
            "itemProductBasic" => $listProduct,
        ]);
    }
}
