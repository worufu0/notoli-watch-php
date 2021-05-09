<?php
class ProductControl extends Controller
{
    public $prod;
    public $request;
    public function __construct()
    {
        $this->request = new Request();
        $this->prod = $this->model("productModel");
    }
    private function AddListPhoto($valLatest)
    {
        $target = SITE_ROOT . "public/assets/img/products/";
        $allowedFileType = array('jpg', 'png', 'jpeg');

        // Velidate if files exist
        if (!empty(array_filter($_FILES['fileUpload']['name']))) {
            // Loop through file items
            foreach ($_FILES['fileUpload']['name'] as $id => $val) {
                // Get files upload path
                $fileName        = $_FILES['fileUpload']['name'][$id];
                // Chống trùng lặp hình ảnh
                $fileName        = uniqid() . basename($fileName);
                $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
                $targetFilePath  = $target . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                if (in_array($fileType, $allowedFileType)) {
                    if (move_uploaded_file($tempLocation, $targetFilePath)) {
                        $resultAlbum = $this->prod->InsertAlbum($valLatest, $fileName);
                        $resultAlbum = json_decode($resultAlbum);
                        if (!$resultAlbum) {
                            echo "Thất bại";
                        }
                    } else {
                        echo "Thất bại";
                    }
                } else {
                    echo "File không đúng định dạng";
                }
            }
        }
    }
    private function AddProduct()
    {
        $prod_title = $this->request->getPost("productTitle");
        $prod_cat = $this->request->getPost("category");
        $prod_brand = $this->request->getPost("brand");
        $prod_price = $this->request->getPost("price");
        $prod_quantity = $this->request->getPost("qty");
        $prod_view = 0;
        $prod_origin = $this->request->getPost("origin");
        $prod_tinydes = $this->request->getPost("editor");
        $prod_fulldes = $this->request->getPost("editorFull");
        $prod_date = date('Y-m-d H:i:s', time());
        $prod_image = $_FILES['avatar']['name'];
        $prod_image = uniqid() . basename($prod_image);
        $target = SITE_ROOT . "public/assets/img/products/" . $prod_image;
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target)) {
            //Tiến hành thêm sản phẩm mới vào datatbase
            $resultCreateProduct = $this->prod->InsertNewProduct($prod_cat, $prod_brand, $prod_title, $prod_price, $prod_quantity, $prod_view, $prod_tinydes, $prod_fulldes, $prod_image, $prod_date, $prod_origin);
            $resultCreateProduct = json_encode($resultCreateProduct);
            if ($resultCreateProduct) {
                $valLatest = $this->prod->GetProdIDLatest();
                $valLatest = json_decode($valLatest);
                //Thực hiện add sản phẩm vào 
                $this->AddListPhoto($valLatest);
            }
        } else {
            echo "Failed to upload image";
        }
    }
    private function UpdateProduct()
    {
        $prod_id = $this->request->getPost("productID");
        $prod_title = $this->request->getPost("productTitle");
        $prod_cat = $this->request->getPost("category");
        $prod_brand = $this->request->getPost("brand");
        $prod_price = $this->request->getPost("price");
        $prod_quantity = $this->request->getPost("qty");
        $prod_origin = $this->request->getPost("origin");
        $prod_tinydes = htmlspecialchars_decode($this->request->getPost("editor"));
        $prod_fulldes = htmlspecialchars_decode($this->request->getPost("editorFull"));
        $prod_image = $_FILES['avatar']['name'];
        //Tiến hành cập nhật sản phẩm mới vào database
        $resultCreateProduct = '';
        if (empty($prod_image)) {
            $resultCreateProduct = $this->prod->UpdateProductNoAvatar($prod_id, $prod_cat, $prod_brand, $prod_title, $prod_price, $prod_quantity, $prod_tinydes, $prod_fulldes, $prod_origin);
        } else {
            $prod_image = uniqid() . basename($prod_image);
            $target = SITE_ROOT . "public/assets/img/products/" . $prod_image;
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target)) {
                $resultCreateProduct = $this->prod->UpdateProduct($prod_id, $prod_cat, $prod_brand, $prod_title, $prod_price, $prod_quantity, $prod_tinydes, $prod_fulldes, $prod_image, $prod_origin);
            } else {
                echo "Failed to upload image";
            }
        }
        $resultCreateProduct = json_encode($resultCreateProduct);
        if ($resultCreateProduct) {
            //Thực hiện add hình của sản phẩm vào database
            $this->AddListPhoto($prod_id);
        }
        if (isset($_POST["deleted_images"])) {
            $listPhoto = $_POST["deleted_images"];
            foreach ($listPhoto as $value) {
                $this->prod->DeleteAlbum($value);
            }
        }
    }
    public function Action()
    {
        if (!isset($_SESSION['loggedINAdmin'])) {
            $location = "./login";
            header("Location: " . $location);
            exit();
        }
        $valueID = '';
        if ($this->request->isQuery("product")) {
            $valueID = $this->request->getQuery("product");
            $result = $this->prod->checkProductID($valueID);
            if ($result == 'false') {
                header("Location:" . DOMAINADMIN . "/productcontrol");
            }
        }
        if ($this->request->isPost("addProduct")) {
            $valueID = $this->request->getPost("productID");
            if ($valueID != '') {
                $resultMessage = $this->UpdateProduct($valueID);
            } else {
                $resultMessage = $this->AddProduct();
            }
        }
        $this->view("AdminLayout", [
            "page" => "ProductControl",
            //Danh sách loại sản phẩm
            "listCategory" => $this->prod->ShowListCategories(),
            //Danh sách nhà sản xuất
            "listBrand" => $this->prod->ShowListBrand(),
            //Chi tiết sản phẩm
            "detailProduct" => $this->prod->ShowDetailsProduct($valueID),
            //Danh sách hình ảnh của sản phẩm
            "listAlbum" => $this->prod->GetAlbumOfProduct($valueID),
        ]);
    }
}
