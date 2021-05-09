<?php
class Home extends Controller
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
        $this->view("MiniLayout", [
            "page" => "Home",
            "itemProduct" => $this->prod->Product(),
            //Top 12 sản phẩm mới nhất
            "itemTopNew" => $this->prod->TopNew(),
            //Top 12 sản phẩm bán chạy nhất
            "itemTopHot" => $this->prod->TopHot(),
            //Item trong minicart
            "itemListCart" => $this->cart->GetItemCart(),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
            "listCategories" => $this->prod->ShowListCategories(),
            //Lấy danh sách nhà sản xuất (Rolex, Apple)
            "listBrands" => $this->prod->ShowListBrand(),
            //Danh sách banner
            "listBanner" => $this->prod->ShowListBanner(),

        ]);
    }
}
