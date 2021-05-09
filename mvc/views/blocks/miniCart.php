<aside class="mini-cart" id="miniCart">
    <div class="mini-cart-wrapper">
        <a href="" class="btn-close"><i class="flaticon flaticon-cross"></i></a>
        <div class="mini-cart-inner">
            <h3 class="mini-cart__heading mb--40 mb-lg--30">Giỏ hàng</h3>
            <div class="mini-cart__content" id="mini-cart-content">
                <ul class="mini-cart__list dev-miniCart">
                    <?php
                    $totalPrice = 0;
                    if (isset($_SESSION["loggedIN"])) {
                        while ($rows = mysqli_fetch_array($data["itemListCart"])) {
                            $prod_id = $rows["prod_id"];
                            $itemID = $rows['cart_id'];
                            $itemCartTitle = $rows['cart_prodTitle'];
                            $itemCartQuantity = $rows['cart_quantity'];
                            $itemUnitPrice = $rows['cart_price'] / $itemCartQuantity;
                            $itemImage = $rows['prod_image'];
                            $totalPrice = $totalPrice + $rows['cart_price'];
                    ?>
                            <li class="mini-cart__product">
                                <a href="" class="remove-from-cart remove" id="<?php echo $itemID ?>">
                                    <i class="flaticon flaticon-cross"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="./public/assets/img/products/<?php echo $itemImage ?>" alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title dev-title-cart" href="product/detail/<?php echo $prod_id ?>"><?php echo $rows['cart_prodTitle'] ?>
                                    </a>
                                    <span class="mini-cart__product__quantity"><?php echo $itemCartQuantity . ' x ' . number_format($itemUnitPrice, 0, '', ',') . '₫' ?></span>
                                </div>
                            </li>
                    <?php }
                    } ?>
                </ul>
                <div class="mini-cart__total">
                    <span>Tổng tiền</span>
                    <span class="ammount"><?php echo number_format($totalPrice, 0, '', ',') ?>₫</span>
                </div>
                <div class="mini-cart__buttons">
                    <a href="cart" class="btn btn-fullwidth btn-bg-sand mb--20">Xem giỏ hàng</a>
                    <a href="checkout" class="btn btn-fullwidth btn-bg-sand">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</aside>