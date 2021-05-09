<?php
class Cart extends Controller
{
    public $cart;
    public $prod;
    public function __construct()
    {
        $this->cart = $this->model("CartModel");
        $this->prod = $this->model("productModel");
    }
    public function Action()
    {
        if (isset($_SESSION["loggedIN"])) {
            $cart_user = $_SESSION["userID"];
            $this->view("MiniLayout", [
                "page" => "Cart",
                "itemProduct" => $this->prod->Product(),
                "itemCart" => $this->cart->GetItemCart(),
                "itemListCart" => $this->cart->GetItemCart(),
                "itemTotalPrice" => $this->cart->GetTotalPrice($cart_user),
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories" => $this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands" => $this->prod->ShowListBrand(),
            ]);
        } else {
            $location = "./";
            header("Location: " . $location);
        }
    }
    //Thêm vào giỏ hàng
    public function InsertCart()
    {
        //Kiểm tra người dùng có login hay không
        if (isset($_SESSION['loggedIN'])) {

            //Lấy thông tin của product muốn thêm vào giỏ hàng
            $prod_id = $_POST["product_id"];
            $data = $this->prod->SelectProduct($prod_id);
            $row = mysqli_fetch_array($data);
            $prod_title = $row["prod_title"];
            $prod_price = $row["prod_price"];
            $userID = $_SESSION["userID"];
            //Số lượng sản phẩm cần thêm
            $cart_quantity = $_POST["cart_quantity"];
            //Số lượng sản phẩm hiện tại trong giỏ của khách hàng
            $inCartUser = json_decode($this->cart->InCartUser($prod_id));
            //Số  sản phẩm hiện tại trong kho
            $inStock = json_decode($this->prod->InStock($prod_id));
            if ($cart_quantity >= $inStock) {
                $cart_quantity = $inStock - $inCartUser;
            }
            //Lấy ID giỏ hàng, nếu sản phẩm đã tồn tại
            $cartID = $this->cart->GetCartID($userID, $prod_id);
            if ($cartID != "false") {
                $resultUpdateQuantityCart = $this->cart->UpdateQuantityCart($cartID, $cart_quantity, $prod_price);
                if ($resultUpdateQuantityCart == "true") {
                    exit("true");
                }
                exit("false");
            }
            //Thêm thông tin vào giỏ hàng
            $resultInsertCart = $this->cart->InsertCart($prod_id, $userID, $prod_title, $cart_quantity, $prod_price);
            if ($resultInsertCart == "true") {
                exit("true");
            }
            exit("false");
        } else {
            // Không cho thêm vào giỏ hàng khi chưa login
            exit("noLogin");
        }
    }
    public function LoadCart()
    {
        if (isset($_SESSION["loggedIN"])) {
            $result = $this->cart->GetItemCart();
            $rowcount = mysqli_num_rows($result);
            print_r($rowcount);
            exit();
        }
        exit('null');
    }
    public function LoadMiniCart()
    {
        $result = $this->cart->GetItemCart();
        if (!isset($_SESSION["loggedIN"])) {
            exit("null");
        }
        $totalPrice = 0;
        $output = '
        <ul class="mini-cart__list dev-miniCart">';
        while ($rows = mysqli_fetch_array($result)) {
            $prod_id = $rows['prod_id'];
            $itemID = $rows['cart_id'];
            $itemCartTitle = $rows['cart_prodTitle'];
            $itemCartQuantity = $rows['cart_quantity'];
            $itemUnitPrice = $rows['cart_price'] / $itemCartQuantity;
            $itemImage = $rows['prod_image'];
            $totalPrice = $totalPrice + $rows['cart_price'];
            $output .= '
            <li class="mini-cart__product">
                <a href="" class="remove-from-cart remove" id="' . $itemID . '">
                    <i class="flaticon flaticon-cross"></i>
                </a>
                <div class="mini-cart__product__image">
                    <img src=./public/assets/img/products/' . $itemImage . ' alt="products">
                </div>
                <div class="mini-cart__product__content">
                    <a class="mini-cart__product__title dev-title-cart" href="product/detail/' . $prod_id . '">' . $itemCartTitle . '</a>
                    <span class="mini-cart__product__quantity">' . $itemCartQuantity . ' x ' . number_format($itemUnitPrice, 0, '', ',') . '₫ </span>
                </div>
            </li>';
        }
        $output .= '
        </ul>';
        $output .= '
        <div class="mini-cart__total">
            <span>Tổng tiền</span>
            <span class="ammount">' . number_format($totalPrice, 0, '', ',') . '₫</span>
        </div>';
        $output .= '
        <div class="mini-cart__buttons">
            <a href="cart" class="btn btn-fullwidth btn-bg-sand mb--20">Xem giỏ hàng</a>
            <a href="checkout" class="btn btn-fullwidth btn-bg-sand">Thanh toán</a>
        </div>';
        exit($output);
    }

    public function RemoveCart()
    {
        //Kiểm tra người dùng có login hay không
        $cart_id = $_POST["cart_id"];
        $resultRemoveCart = $this->cart->RemoveCart($cart_id);
        if ($resultRemoveCart == "true") {
            exit("true");
        }
        exit("false");
    }

    public function UpdateCart()
    {
        $cart_id = $_POST["cart_id"];
        $cart_quantity = $_POST["cart_quantity"];
        $cart_user = $_SESSION["userID"];
        //Lấy đơn giá
        $cart_unitPrice = $this->cart->GetUnitPrice($cart_id);
        //Cập nhật giỏ hàng
        $cart_price = $cart_quantity * json_decode($cart_unitPrice);
        $resultUpdateCart = $this->cart->UpdateCart($cart_id, $cart_quantity, $cart_price);
        $resultTotalPrice = $this->cart->GetTotalPrice($cart_user);
        $result = array();
        if ($resultTotalPrice != "false" && $resultUpdateCart == "true") {
            $result['price'] = $cart_price;
            $result['priceTotal'] = json_decode($resultTotalPrice);
            exit(json_encode($result));
        }
        exit("false");
        // exit(json_encode($resultTotalPrice));
        // if($resultUpdateCart == "true") {
        //     exit(json_encode($cart_price));
        // }
        // exit("false");
    }
    public function LoadPageCart()
    {
        $itemResult = $this->cart->GetPriceTotalCart();
        $result = array();
        $result['priceTotal'] = json_decode($itemResult);
        exit(json_encode($result));
    }
}
