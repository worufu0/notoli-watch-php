<?php
class Checkout extends Controller
{
    public function __construct()
    {
        $this->cart = $this->model("CartModel");
        $this->prod = $this->model("productModel");
        $this->check = $this->model("CheckoutModel");
    }
    public function Action()
    {
        if (isset($_SESSION["loggedIN"])) {
            $cart_user = $_SESSION["userID"];
            $this->view("MiniLayout", [
                "page" => "Checkout",
                //Item minicart
                "itemListCart" => $this->cart->GetItemCart(),
                //Item đơn hàng
                "itemListOrder" => $this->cart->GetItemCart(),
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories" => $this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands" => $this->prod->ShowListBrand(),

            ]);
        } else {
            $location = DOMAIN;
            header("Location: " . $location);
        }
    }
    public function ActionOrder()
    {
        //Kiểm tra số lượng sản phẩm tron giỏ hàng, nếu không có thì xuất thông báo không có sản phẩm!
        $quantity_cart = $this->check->GetTotalCart();
        $quantity_cart = json_decode($quantity_cart);
        if ($quantity_cart < 1) {
            $this->view("MiniLayout", [
                "page" => "success",
                //Item minicart
                "itemListCart" => $this->cart->GetItemCart(),
                //Thông báo kết quả
                "result" => "Giỏ hàng không có sản phẩm, thanh toán thất bại!",
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories" => $this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands" => $this->prod->ShowListBrand(),
            ]);
            exit();
        }
        //Lấy dữ liệu để insert cho bảng Orders
        $billing_name = $_POST["billing_name"];
        $billing_date  = date("Y-m-d");
        $billing_city = $_POST["billing_city"];
        $billing_state = $_POST["billing_state"];
        $billing_streetAddress = $_POST["billing_streetAddress"];
        $billing_phone = $_POST["billing_phone"];
        $billing_email = $_POST["billing_email"];
        $billing_orderNotes = $_POST["orderNotes"];
        $billing_amount = $this->check->GetPriceTotalCart();
        $billing_amount = json_decode($billing_amount);
        $billing_userID = $_SESSION["userID"];
        if ($billing_name == '' || $billing_city == '' || $billing_state == '' || $billing_streetAddress == '' || $billing_phone == '' || $billing_email == '') {
            $this->view("MiniLayout", [
                "page" => "success",
                //Item minicart
                "itemListCart" => $this->cart->GetItemCart(),
                //Thông báo kết quả
                "result" => "Thanh toán thất bại!",
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories" => $this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands" => $this->prod->ShowListBrand(),
            ]);
            exit();
        }
        //Thực hiện tạo đơn hàng mới trong bảng Orders
        $resultOrders = $this->check->InsertOrders($billing_userID, $billing_name, $billing_date, $billing_email, $billing_phone, $billing_city, $billing_amount, $billing_orderNotes);
        //Thực hiện chi tiết đơn hàng trong bảng orderDetails
        if ($resultOrders == "true") {
            $resultListOrder = $this->check->GetItemCart();
            $resultIDOrder = $this->check->GetLastRowOrder();
            while ($rows = mysqli_fetch_array($resultListOrder)) {
                $order_id = $resultIDOrder;
                $product_id = $rows["cart_prodID"];
                $quantity = $rows["cart_quantity"];
                $unitPrice = $rows["cart_price"] / $quantity;
                $resultOrderDetails = $this->check->InsertOrderDetails($order_id, $product_id, $quantity, $unitPrice);
                $resultOrderDetails = $this->check->PickQuantityProduct($product_id, $quantity);
            }
        }
        $resultTotal = $this->check->DeleteCart();
        if ($resultTotal == "true") {
            $this->view("MiniLayout", [
                "page" => "success",
                //Item minicart
                "itemListCart" => $this->cart->GetItemCart(),
                //Thông báo kết quả
                "result" => "Thanh toán đơn hàng thành công!",
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories" => $this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands" => $this->prod->ShowListBrand(),

            ]);
        } else {
            $this->view("MiniLayout", [
                "page" => "success",
                //Item minicart
                "itemListCart" => $this->cart->GetItemCart(),
                //Thông báo kết quả
                "result" => "Thành toán thất bại!",
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories" => $this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands" => $this->prod->ShowListBrand(),
            ]);
        }
    }
}
