<!-- Breadcrumb area Start -->
<div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                    <h1 class="page-title">Shop</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="current"><span>Shop</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
    <div class="shop-page-wrapper ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 order-lg-2 mb-md--50">
                    <div class="shop-toolbar mb--50">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="shop-toolbar__right d-flex justify-content-md-end justify-content-start flex-sm-row flex-column">
                                    <div class="product-view-mode ml--50 ml-xs--0">
                                        <a class="active" href="#" data-target="grid">
                                            <img src="./public/assets/img/icons/grid.png" alt="Grid">
                                        </a>
                                        <a href="#" data-target="list">
                                            <img src="./public/assets/img/icons/list.png" alt="Grid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-products" id="ajax_layout">
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
                                                    <a href="" id="<?php echo $product_id ?>" class="btn btn-small btn-bg-sand btn-color-dark addCart">Thêm giỏ hàng </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- <nav class="pagination-wrap">
                        <ul class="pagination">
                            <li><a href="#" class="prev page-number"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><span class="current page-number">1</span></li>
                            <li><a href="#" class="page-number">2</a></li>
                            <li><a href="#" class="page-number">3</a></li>
                            <li><a href="#" class="next page-number"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav> -->
                </div>
                <div class="col-xl-3 col-lg-4 order-lg-1">
                    <aside class="shop-sidebar">
                        <div class="shop-widget mb--40">
                            <h3 class="widget-title mb--25">Loại đồng hồ</h3>
                            <span class="tickCat">
                                <input type="radio" id="cat_0" name="cat" value="0" checked>
                                <label for="cat_0">Tất cả</label><br>
                            </span>
                            <?php while ($rows = mysqli_fetch_array($data["filterCategories"])) {
                                $catID = $rows["cat_id"];
                                $catTitle = $rows["cat_title"];
                            ?>
                                <span class="tickCat">
                                    <input type="radio" id="cat_<?php echo $catID ?>" name="cat" value="<?php echo $catID ?>">
                                    <label for="cat_<?php echo $catID ?>"><?php echo $catTitle ?></label><br>
                                </span>
                            <?php } ?>
                        </div>
                        <div class="shop-widget mb--40">
                            <?php $maxPrice = json_decode($data["maxPrice"]);
                            ?>
                            <h3 class="widget-title mb--25">Giá bán</h3>
                            <div class="middle mb--25">
                                <div class="multi-range-slider">
                                    <input oninput="trigerLeft()" type="range" id="input-left" min="0" max="<?php echo $maxPrice ?>" value="0">
                                    <input oninput="trigerRight()" type="range" id="input-right" min="0" max="<?php echo $maxPrice ?>" value="<?php echo $maxPrice ?>">
                                    <div class="slider">
                                        <div class="track"></div>
                                        <div class="range"></div>
                                        <div class="thumb left"></div>
                                        <div class="thumb right"></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span>Từ: </span>
                                <span id="minPrice">0 ₫</span>
                                </br>
                                <span>Đến: </span>
                                <span id="maxPrice"><?php echo number_format($maxPrice, 0, '', '.') ?> ₫</span>
                            </div>
                        </div>
                        <div class="shop-widget mb--40">
                            <h3 class="widget-title mb--30">Nhà sản xuất</h3>
                            <span class="tickBrand">
                                <input type="radio" id="brand_0" name="brand" value="0" checked>
                                <label for="brand_0">Tất cả</label><br>
                            </span>
                            <?php while ($rows = mysqli_fetch_array($data["listBrand"])) {
                                $brandID = $rows["brand_id"];
                                $brandTitle = $rows["brand_title"];
                            ?>
                                <span class="tickBrand">
                                    <input type="radio" id="brand_<?php echo $brandID ?>" name="brand" value="<?php echo $brandID ?>">
                                    <label for="brand_<?php echo $brandID ?>"><?php echo $brandTitle ?></label><br>
                                </span>
                            <?php } ?>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./public/assets/js/dev.js"></script>

<!-- Main Content Wrapper Start -->