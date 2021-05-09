<?php
class CartModel extends DB {
    //Show dữ liệu giỏ hàng
    public function GetItemCart() {
        if(isset($_SESSION["loggedIN"])){
        $userID = $_SESSION["userID"];
        $qr = "SELECT `cart`.*, `products`.`prod_image`, `products`.`prod_quantity`, `products`.`prod_id`";
        $qr .= "FROM `cart` JOIN `products` ON `cart`.`cart_prodID` = `products`.`prod_id`";
        $qr .= "WHERE `cart`.`cart_user`=$userID";
        return mysqli_query($this->con, $qr);
        }
    }
    public function InCartUser($pro_id) {
        if(isset($_SESSION["loggedIN"])){
            $userID = $_SESSION["userID"];
            $qr = "SELECT cart_quantity FROM cart WHERE cart_user = $userID AND cart_prodID = $pro_id";
            $result = mysqli_query($this->con, $qr);
            $rows = mysqli_fetch_array($result);
            return json_encode($rows["cart_quantity"]);
        }
    }
    //Tỉnh tổng tiền giỏ hàng
    public function GetPriceTotalCart() {
        if(isset($_SESSION["loggedIN"])){
            $userID = $_SESSION["userID"];
            $qr = "SELECT SUM(cart_price) FROM cart WHERE cart_user = $userID";
            $result = mysqli_query($this->con, $qr);
            $rows = mysqli_fetch_array($result);
            return json_encode($rows[0]);
        }
    }
    //Thêm vào giỏ hàng
    public function InsertCart($prod_id, $userID, $prod_title, $cart_quantity, $prod_price) {
        $prod_price = $prod_price * $cart_quantity;
        $qr = "INSERT INTO `cart` VALUES (NULL, '$userID', '$prod_id', '$prod_title', '$cart_quantity', '$prod_price')";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Lấy UserID quản lí giỏ hàng
    public function GetUserID($username) {
        $qr = "SELECT user_id FROM users WHERE user_username = '$username'";
        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        return json_encode($rows["user_id"]);
    }
    //Kiểm tra sản phảm được user thêm vào nhiều lần
    public function GetCartID($userID, $prod_id) {
        $qr = "SELECT cart_id FROM cart WHERE cart_user = '$userID' AND cart_prodID = '$prod_id'";
        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        if($rows) {
            return json_encode($rows["cart_id"]);
        }
        return json_encode(false);
    }
    //Cập nhật số lượng trong giỏ hàng
    public function UpdateQuantityCart($cart_id, $cart_quantity, $cart_price) {
        //Lấy số lượng sản phẩm hiện lại
        $qr = "SELECT cart_quantity FROM `cart` WHERE cart_id = $cart_id";
        //return json_encode($qr);

        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        $cart_quantity = $cart_quantity + $rows["cart_quantity"];
        $cart_price = $cart_price * $cart_quantity;
        //Cập nhật lại số lượng sản phẩm
        $qr = "UPDATE `cart`
        SET `cart_quantity` = '$cart_quantity', `cart_price` = '$cart_price'
        WHERE `cart`.`cart_id` = $cart_id";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    public function RemoveCart($cart_id) {
        $qr = "DELETE FROM `cart` WHERE `cart`.`cart_id` = $cart_id";
        mysqli_query($this->con, $qr);
        $affect =  $this->con->affected_rows;
        $result = false;
        if($affect > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    public function GetUnitPrice($cart_id) {
        $qr = "SELECT `prod_price` FROM `products` JOIN `cart` on `cart`.`cart_prodID` = `products`.`prod_id` WHERE `cart`.`cart_id` = $cart_id";
        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        return json_encode($rows["prod_price"]);
    }
    public function UpdateCart($cart_id, $cart_quantity, $cart_price) {
        $qr = "UPDATE `cart` SET `cart_quantity` = $cart_quantity, `cart_price` = $cart_price WHERE `cart`.`cart_id` = $cart_id";
        if(mysqli_query($this->con, $qr) === true) {
            return json_encode(true);
        }
    }
    public function GetTotalPrice($cart_user) {
        $qr = "SELECT SUM(`cart_price`) FROM `cart` WHERE `cart_user`=$cart_user";
        $result = mysqli_query($this->con, $qr);
        $count = mysqli_num_rows($result);
        if($count > 0) {
            $rows = mysqli_fetch_array($result);
            return json_encode($rows[0]);
        }
        return json_encode("false");
    }
}
