<?php
class productModel extends DB
{
    //Show sản phẩm, trang chủ
    public function Product()
    {
        $qr = "SELECT * FROM products";
        return mysqli_query($this->con, $qr);
    }
    //Show top 12 sản phẩm mới nhất
    public function TopNew()
    {
        $qr = "SELECT * FROM products ORDER BY prod_date DESC LIMIT 12";
        return mysqli_query($this->con, $qr);
    }
    //Show top 12 sản phẩm bán chạy nhất
    public function TopHot()
    {
        $qr = "SELECT *, SUM(o.quantity) q FROM products p JOIN orderdetails o 
        ON p.prod_id = o.product_id
        WHERE p.prod_quantity > 0
        GROUP BY p.prod_id 
        ORDER BY q DESC 
        LIMIT 12";
        return mysqli_query($this->con, $qr);
    }
    //Tồn kho
    public function InStock($prod_id)
    {
        $qr = "SELECT prod_quantity FROM products WHERE prod_id = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $rows =  mysqli_fetch_array($result);
        return json_encode($rows["prod_quantity"]);
    }
    //Show sản phẩm trang sản phẩm
    public function SelectAllProduct()
    {
        $qr = "SELECT * FROM products";
        return mysqli_query($this->con, $qr);
    }
    public function SelectProduct($prod_id)
    {
        $qr = "SELECT prod_title, prod_price FROM products WHERE prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Show hãng sản phẩm
    public function SelectBrand()
    {
        $qr = "SELECT * FROM brands";
        return mysqli_query($this->con, $qr);
    }
    //Show chi tiết sản phẩm
    public function ShowDetailsProduct($prod_id)
    {
        $qr = "SELECT * FROM products WHERE prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Hiện thị danh sách hình ảnh
    public function ShowListPhoto($prod_id)
    {
        $qr = "SELECT photo_name FROM photos WHERE photo_prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Cập nhật lượt xem
    public function UpView($prod_id)
    {
        $qr = "UPDATE `products` SET `prod_view` = `prod_view` + 1 WHERE `prod_id` = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Lấy số lượng sản phẩm đã bán
    public function GetSold($prod_id)
    {
        $qr = "SELECT SUM(quantity) FROM orderdetails WHERE product_id = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $rows =  mysqli_fetch_array($result);
        return json_encode($rows[0]);
    }

    public function GetTitleBrand($prod_id)
    {
        $qr = "SELECT `brands`.`brand_title` FROM `brands` JOIN `products` ON `brands`.`brand_id` = `products`.`prod_brand` WHERE `products`.`prod_id` = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $rows =  mysqli_fetch_array($result);
        return json_encode($rows[0]);
    }
    public function ShowFiveProduct($prod_id)
    {
        $qr = "SELECT prod_cat FROM products WHERE prod_id = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $cat_id = mysqli_fetch_array($result);
        $cat_id = $cat_id[0];
        $qr = "SELECT prod_id, prod_title, prod_price, prod_image FROM `products` WHERE prod_cat = $cat_id ORDER BY RAND() LIMIT 5";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }
    //Lấy danh sách loại sản phẩm
    public function ShowListCategories()
    {
        $qr = "SELECT * FROM `categories`";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }
    //Lấy danh sách nhà sản xuất
    public function ShowListBrand()
    {
        $qr = "SELECT * FROM `brands`";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }
    //Lấy toàn bộ sản phẩm theo 1 loại sản phẩm (VD: toàn bộ sản phẩm của đồng hồ thời trang)
    public function ProductOfCategories($cat_id)
    {
        $qr = "SELECT * FROM products WHERE prod_cat = $cat_id ORDER BY RAND()";
        return mysqli_query($this->con, $qr);
    }
    //Lấy toàn bộ sản phẩm theo 1 nhà sản xuất (VD: toàn bộ sản phẩm của rolex)
    public function ProductOfBrands($brand_id)
    {
        $qr = "SELECT * FROM products WHERE prod_brand = $brand_id ORDER BY RAND()";
        return mysqli_query($this->con, $qr);
    }
    //Show sản phẩm trang sản phẩm
    public function SelectFilterProduct($brand, $cat, $priceMin, $priceMax, $title)
    {
        $qr = "SELECT * FROM `products`
                WHERE prod_brand = $brand
                AND prod_cat = $cat
                AND prod_quantity > 0
                AND prod_title LIKE N'%$title%'
                AND prod_price >= $priceMin
                AND prod_price <= $priceMax 
                ORDER BY RAND()";
        return mysqli_query($this->con, $qr);
    }
    //Tìm giá bán cao nhất, dùng cho chức năng tìm kiếm nâng cao (input range) lọc giá bán
    public function GetMaxPrice()
    {
        $qr = "SELECT MAX(prod_price) FROM `products`";
        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        return json_encode($rows[0]);
    }
    public function SearchProduct($itemSearch)
    {
        $qr = "SELECT * FROM products WHERE prod_title LIKE N'%$itemSearch%'";
        return mysqli_query($this->con, $qr);
    }
    //Danh sách banner
    public function ShowListBanner()
    {
        $qr = "SELECT * FROM banner";
        return mysqli_query($this->con, $qr);
    }
    //====== Phần danh cho phân hệ admin
    //Liệt kê sản phẩm cho trang quản lí sản phẩm
    public function ShowProductBasic()
    {
        $qr = "SELECT * FROM `products` JOIN `brands` ON prod_brand = brand_id JOIN categories ON prod_cat = cat_id";
        return mysqli_query($this->con, $qr);
    }
    //Tìm kiếm sản phẩm
    public function SearchProductAdmin($itemSearch)
    {
        $qr = "SELECT * FROM `products` JOIN `brands` ON prod_brand = brand_id JOIN categories ON prod_cat = cat_id WHERE prod_title LIKE N'%$itemSearch%'";
        return mysqli_query($this->con, $qr);
    }
    //Thêm sản phẩm mới
    public function InsertNewProduct($prod_cat, $prod_brand, $prod_title, $prod_price, $prod_quantity, $prod_view, $prod_tinydes, $prod_fulldes, $prod_image, $prod_date, $prod_origin)
    {
        $qr = "INSERT INTO `products` VALUES(NULL, '$prod_cat', '$prod_brand', '$prod_title', '$prod_price', '$prod_quantity', '$prod_view', '$prod_tinydes', '$prod_fulldes', '$prod_image', '$prod_date', '$prod_origin')";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    public function UpdateProduct($prod_id, $prod_cat, $prod_brand, $prod_title, $prod_price, $prod_quantity, $prod_tinydes, $prod_fulldes, $prod_image, $prod_origin)
    {
        $qr = "UPDATE `products` SET prod_id='$prod_id', prod_cat='$prod_cat', prod_brand='$prod_brand', prod_title='$prod_title', prod_price='$prod_price', prod_quantity='$prod_quantity', prod_tinydes='$prod_tinydes', prod_fulldes='$prod_fulldes', prod_image='$prod_image', prod_origin='$prod_origin' WHERE prod_id='$prod_id'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    public function UpdateProductNoAvatar($prod_id, $prod_cat, $prod_brand, $prod_title, $prod_price, $prod_quantity, $prod_tinydes, $prod_fulldes, $prod_origin)
    {
        $qr = "UPDATE `products` SET prod_id='$prod_id', prod_cat='$prod_cat', prod_brand='$prod_brand', prod_title='$prod_title', prod_price='$prod_price', prod_quantity='$prod_quantity', prod_tinydes='$prod_tinydes', prod_fulldes='$prod_fulldes', prod_origin='$prod_origin' WHERE prod_id='$prod_id'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Lấy ID vừa được thêm vào
    public function GetProdIDLatest()
    {
        $qr = "SELECT prod_id FROM products ORDER BY prod_id DESC LIMIT 1";
        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        return json_encode($rows["prod_id"]);
    }
    public function InsertAlbum($prod_id, $photoName)
    {
        $qr = "INSERT INTO `photos` VALUES(NULL, '$prod_id', '$photoName')";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Lấy hình album hình ảnh của 1 sản phẩm bất kì 
    public function GetAlbumOfProduct($prod_id)
    {
        $qr = "SELECT * FROM `photos` WHERE photo_prod_id = '$prod_id'";
        return mysqli_query($this->con, $qr);
    }
    //Kiểm tra ProductID có trong hệ thống hay không
    public function checkProductID($prod_id)
    {
        $qr = "SELECT prod_id FROM products WHERE prod_id = '$prod_id'";
        $rows = mysqli_query($this->con, $qr);
        $result = false;
        if (mysqli_num_rows($rows) > 0) {
            $result = true;
        }
        return json_encode($result);
    }
    //Xóa album ảnh
    public function DeleteAlbum($image_id)
    {
        $qr = "DELETE FROM photos WHERE photo_id='$image_id'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Xóa sản phẩm
    public function DeleteProduct($prod_id)
    {
        $qr = "DELETE FROM `products` WHERE prod_id='$prod_id'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Tìm kiếm danh mục sản phẩm
    public function SearchCategories($itemSearch)
    {
        $qr = "SELECT * FROM `categories` WHERE cat_title LIKE N'%$itemSearch%'";
        return mysqli_query($this->con, $qr);
    }
    //Insert Danh mục sản phẩm
    public function InsertCategories($title)
    {
        $qr = "INSERT INTO `categories` VALUES (NULL, '$title')";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Xóa Danh danh mục sản phẩm
    public function DeleteCategories($id)
    {
        $qr = "DELETE FROM `categories` WHERE cat_id='$id'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Lấy chi tiết của danh mục sản phẩm
    public function GetDetailCat($id)
    {
        $qr = "SELECT * FROM `categories` WHERE cat_id = '$id'";
        return mysqli_query($this->con, $qr);
    }
    //Cập nhật chi tiết của danh mục sản phẩm
    public function UpdateCategories($valueID, $resultTitle)
    {
        $qr = "UPDATE `categories` SET cat_title ='$resultTitle' WHERE cat_id='$valueID'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }





    //Tìm kiếm danh mục sản phẩm
    public function SearchBrand($itemSearch)
    {
        $qr = "SELECT * FROM `brands` WHERE brand_title LIKE N'%$itemSearch%'";
        return mysqli_query($this->con, $qr);
    }
    //Insert Danh mục sản phẩm
    public function InsertBrand($title)
    {
        $qr = "INSERT INTO `brands` VALUES (NULL, '$title')";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Xóa Danh danh mục sản phẩm
    public function DeleteBrand($id)
    {
        $qr = "DELETE FROM `brands` WHERE brand_id='$id'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    //Lấy chi tiết của danh mục sản phẩm
    public function GetDetailBrand($id)
    {
        $qr = "SELECT * FROM `brands` WHERE brand_id = '$id'";
        return mysqli_query($this->con, $qr);
    }
    //Cập nhật chi tiết của danh mục sản phẩm
    public function UpdateBrand($valueID, $resultTitle)
    {
        $qr = "UPDATE `brands` SET brand_title ='$resultTitle' WHERE brand_id='$valueID'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }


    public function ShowListOrder()
    {
        $qr = "SELECT * FROM `orders`";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }

    public function SearchOrder($valSearch)
    {
        $qr = "SELECT * FROM `orders` WHERE order_name LIKE N'%$valSearch%'";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }

    public function DeleteOrder($id)
    {
        $qr = "DELETE FROM `orders` WHERE order_id='$id'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function ShowUser()
    {
        $qr = "SELECT * FROM `users`";
        return mysqli_query($this->con, $qr);
    }
}
