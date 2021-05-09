<?php
class Order extends Controller
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
        $checkDelete = $this->request->isPost('idDelCat');
        if ($checkDelete) {
            $valID = $this->request->getPost('idDelCat');
            $this->prod->DeleteOrder($valID);
        }
        $checkSearch = $this->request->isQuery("search");
        if ($checkSearch) {
            $valSearch = $this->request->getQuery("search");
            $listOrder = $this->prod->SearchOrder($valSearch);
        } else {
            $listOrder = $this->prod->ShowListOrder();
        }
        $this->view("AdminLayout", [
            "page" => "Order",
            "listOrder" => $listOrder,
        ]);
    }
}
