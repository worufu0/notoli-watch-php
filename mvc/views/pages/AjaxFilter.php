<div class="row">
    <?php
    while ($rows = mysqli_fetch_array($data["allProduct"])) {
        $product_id = $rows["prod_id"];
        $product_image = $rows["prod_image"];
        $product_title = $rows["prod_title"];
        $product_tinydes = $rows["prod_tinydes"];
        $product_price = number_format($rows["prod_price"], 0, '', '.');
    ?>
        <div class="col-xl-4 col-sm-6 mb--50">
            <div class="zakas-product">
                <div class="product-inner">
                    <figure class="product-image">
                        <a href="<?php echo DOMAIN ?>/product/detail/<?php echo $product_id ?>">
                            <img src="./public/assets/img/products/<?php echo $product_image ?>" alt="Products">
                        </a>
                    </figure>
                    <div class="product-info">
                        <h3 class="product-title mb--15">
                            <a href="<?php echo DOMAIN ?>/product/detail/<?php echo $product_id ?>"><?php echo $product_title ?></a>
                        </h3>
                        <div class="product-price-wrapper mb--30">
                            <span class="money"><?php echo $product_price ?> ₫</span>
                        </div>
                        <a href="" id="<?php echo $product_id ?>" class="btn btn-small btn-bg-sand btn-color-dark addCart">Thêm giỏ hàng </a>
                    </div>
                </div>
            </div>
            <div class="zakas-product-list">
                <div class="product-inner">
                    <figure class="product-image">
                        <a href="<?php echo DOMAIN ?>/product/detail/<?php echo $product_id ?>">
                            <img src="./public/assets/img/products/<?php echo $product_image ?>" alt="Products">
                        </a>
                    </figure>
                    <div class="product-info">
                        <h3 class="product-title mb--25">
                            <a href="<?php echo DOMAIN ?>/product/detail/<?php echo $product_id ?>"><?php echo $product_title ?></a>
                        </h3>
                        <div class="product-price-wrapper mb--15 mb-sm--10">
                            <span class="money"><?php echo $product_price ?> ₫</span>
                        </div>
                        <p class="product-short-description mb--20"><?php echo $product_tinydes ?> </p>
                        <div class="zakas-product-action-list d-flex">
                            <a href="" id="<?php echo $product_id ?>" class="btn btn-small btn-bg-sand btn-color-dark addCart">Thêm
                                giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>