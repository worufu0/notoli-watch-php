<?php
class CategoriesControl extends Controller
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
        $valueID = '';
        if ($this->request->isQuery("catid")) {
            $valueID = $this->request->getQuery("catid");
            $result = $this->prod->checkProductID($valueID);
            if ($result == 'false') {
                header("Location:" . DOMAINADMIN . "/categoriescontrol");
            }
        }
        if ($this->request->isPost("addCategory")) {
            $valueID = $this->request->getPost("id");
            $resultTitle = $this->request->getPost("title");
            //cập nhật
            if ($valueID != '') {
                $this->prod->UpdateCategories($valueID, $resultTitle);
            } else {
                //thêm mới
                $this->prod->InsertCategories($resultTitle);
            }
        }
        $this->view("AdminLayout", [
            "page" => "CategoriesControl",
            "detailCat" => $this->prod->GetDetailCat($valueID),
        ]);
    }
}
