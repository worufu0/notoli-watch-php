<?php
class AjaxFilter extends Controller
{
    public $prod;
    public $cart;
    public function __construct()
    {
        $this->prod = $this->model("productModel");
        $this->cart = $this->model("CartModel");
    }
    public function Action()
    {
        $brand = $_POST["prod_brand"];
        $cat = $_POST["prod_cat"];
        $priceMin = $_POST["price_min"];
        $priceMax = $_POST["price_max"];
        $title = $_POST["prod_title"];
        $this->view("AjaxLayout", [
            "page" => "AjaxFilter",
            //Show toàn bộ sản phẩm ra trang sản phẩm
            "allProduct" => $this->prod->SelectFilterProduct($brand, $cat, $priceMin, $priceMax, $title),
        ]);
    }
}
