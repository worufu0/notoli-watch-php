<?php
class BrandControl extends Controller
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
        if ($this->request->isQuery("brandid")) {
            $valueID = $this->request->getQuery("brandid");
            $result = $this->prod->checkProductID($valueID);
            if ($result == 'false') {
                header("Location:" . DOMAINADMIN . "/brandcontrol");
            }
        }
        if ($this->request->isPost("addCategory")) {
            $valueID = $this->request->getPost("id");
            $resultTitle = $this->request->getPost("title");
            //cập nhật
            if ($valueID != '') {
                $this->prod->UpdateBrand($valueID, $resultTitle);
            } else {
                //thêm mới
                $this->prod->InsertBrand($resultTitle);
            }
        }
        $this->view("AdminLayout", [
            "page" => "BrandControl",
            "detailCat" => $this->prod->GetDetailBrand($valueID),
        ]);
    }
}
