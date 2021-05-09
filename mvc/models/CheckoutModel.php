<?php
class CheckoutModel extends DB {
    //Thêm đơn hàng mới vào bảng Orders
    public function InsertOrders($billing_userID, $billing_name, $billing_date, $billing_email, $billing_phone, $billing_addresss, $billing_amount, $billing_orderNotes = NULL) {
        $qr = "INSERT INTO orders VALUES(NULL, '$billing_userID', '$billing_name', '$billing_date', '$billing_email', '$billing_phone', '$billing_addresss', '$billing_amount', '$billing_orderNotes')";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Lấy dữ liệu trong giỏ hàng để insert vào bảng Orders
    public function GetItemCart() {
        if(isset($_SESSION["loggedIN"])){
            $userID = $_SESSION["userID"];
            $qr = "SELECT * FROM cart WHERE cart_user=$userID";
            return mysqli_query($this->con, $qr);
        }
    }
    //Lấy ID của Đơn hàng vừa được tạo
    public function GetLastRowOrder() {
        $qr = "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1";
        $result = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_array($result);
        return $result["order_id"];
    }
    //Thêm chi tiết đơn hàng vào bảng OrderDetails
    public function InsertOrderDetails($order_id, $product_id, $quantity, $unitPrice) {
        $qr = "INSERT INTO orderdetails VALUES (NULL, '$order_id', '$product_id', '$quantity', '$unitPrice')";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Xóa giỏ hàng khi thanh toán
    public function DeleteCart() {
        $userID = $_SESSION["userID"];
        $qr = "DELETE FROM cart WHERE cart_user = '$userID'";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Tính tổng tiền giỏ hàng
    public function GetPriceTotalCart() {
        if(isset($_SESSION["loggedIN"])){
            $userID = $_SESSION["userID"];
            $qr = "SELECT SUM(cart_price) FROM cart WHERE cart_user = $userID";
            $result = mysqli_query($this->con, $qr);
            $rows = mysqli_fetch_array($result);
            return json_encode($rows[0]);
        }
    }
    //Kiểm tra số lượng giỏ hàng
    public function GetTotalCart() {
        if(isset($_SESSION["loggedIN"])){
            $userID = $_SESSION["userID"];
            $qr = "SELECT COUNT(cart_id) FROM cart WHERE cart_user = $userID";
            $result = mysqli_query($this->con, $qr);
            $rows = mysqli_fetch_array($result);
            return json_encode($rows[0]);
        }
    }
    //Giảm số lượng tồn kho sau khi bán
    public function PickQuantityProduct($prod_id, $quantity) {
        $qr = "UPDATE products SET prod_quantity = prod_quantity - $quantity WHERE prod_id = $prod_id";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }    
}
?>