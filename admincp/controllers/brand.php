<?php
class Brand extends Controller
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
            $this->prod->DeleteBrand($valID);
        }
        $checkSearch = $this->request->isQuery("search");
        if ($checkSearch) {
            $valSearch = $this->request->getQuery("search");
            $listCategoris = $this->prod->SearchBrand($valSearch);
        } else {
            $listCategoris = $this->prod->ShowListBrand();
        }
        $this->view("AdminLayout", [
            "page" => "Brand",
            "listCategoris" => $listCategoris,
        ]);
    }
}
