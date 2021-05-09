<?php
class Categories extends Controller
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
            $this->prod->DeleteCategories($valID);
        }
        $checkSearch = $this->request->isQuery("search");
        if ($checkSearch) {
            $valSearch = $this->request->getQuery("search");
            $listCategoris = $this->prod->SearchCategories($valSearch);
        } else {
            $listCategoris = $this->prod->ShowListCategories();
        }
        $this->view("AdminLayout", [
            "page" => "Categories",
            "listCategoris" => $listCategoris,
        ]);
    }
}
