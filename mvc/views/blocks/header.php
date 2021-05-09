<header class="header">
    <div class="header-inner fixed-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-10 col-lg-9 col-3">
                    <nav class="main-navigation">
                        <div class="site-branding">
                            <a href="./home" class="logo">
                                <figure class="logo--transparent">
                                    <img src="./public/assets/img/logo/logo-white.png" alt="Logo">
                                </figure>
                                <figure class="logo--normal">
                                    <img src="./public/assets/img/logo/logo.png" alt="Logo">
                                </figure>
                            </a>
                        </div>
                        <div class="mainmenu-nav d-none d-lg-block">
                            <ul class="mainmenu">
                                <li class="mainmenu__item menu-item-has-children">
                                    <a href="home" class="mainmenu__link">
                                        <span class="mm-text">Trang chủ</span>
                                    </a>
                                </li>
                                <li class="mainmenu__item menu-item-has-children">
                                    <a href="product" class="mainmenu__link">
                                        <span class="mm-text">Sản phẩm</span>
                                    </a>
                                    <ul class="megamenu two-column">
                                        <li>
                                            <a class="megamenu-title">
                                                <span class="mm-text">Nhà sản xuất</span>
                                            </a>
                                            <ul>
                                                <?php while ($rows = mysqli_fetch_array($data["listBrands"])) { ?>
                                                    <li>
                                                        <a href="product/brands/<?php echo $rows["brand_id"] ?>">
                                                            <span class="mm-text"><?php echo $rows["brand_title"] ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="megamenu-title">
                                                <span class="mm-text">Loại sản phẩm</span>
                                            </a>
                                            <ul>
                                                <?php while ($rows = mysqli_fetch_array($data["listCategories"])) { ?>
                                                    <li>
                                                        <a href="product/categories/<?php echo $rows["cat_id"] ?>">
                                                            <span class="mm-text"><?php echo $rows["cat_title"] ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-xl-2 col-lg-3 col-9 text-right">
                    <ul class="header-toolbar">
                        <li class="header-toolbar__item mini-cart-item">
                            <a href="#miniCart" class="header-toolbar__btn toolbar-btn mini-cart-btn">
                                <i class="flaticon flaticon-shopping-cart"></i>
                                <!-- <sup class="mini-cart-count">2</sup> -->
                                <?php
                                $rowcount = 0;
                                if (isset($_SESSION["loggedIN"])) {
                                    $result = $data["itemListCart"];
                                    $rowcount = mysqli_num_rows($result);
                                    if ($rowcount > 0) {
                                        echo '<sup class="mini-cart-count" id="mini-cart-count">' . $rowcount . '</sup>';
                                    } else {
                                        echo '<sup class="mini-cart-count" id="mini-cart-count" style="display:none">' . $rowcount . '</sup>';
                                    }
                                ?>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="header-toolbar__item user-info">
                            <a href="my-account.html" class="header-toolbar__btn">
                                <i class="flaticon flaticon-user"></i>
                            </a>
                            <ul class="user-info-menu">
                                <?php if (!isset($_SESSION['loggedIN'])) { ?>
                                    <li>
                                        <a href="./register">Đăng kí</a>
                                    </li>
                                    <li>
                                        <a href="./login">Đăng nhập</a>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a href="./logout">Đăng xuất</a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a href="./cart">Giỏ hàng</a>
                                </li>
                                <li>
                                    <a href="./checkout">Thanh toán</a>
                                </li>
                            </ul>
                        </li>
                        <li class="header-toolbar__item">
                            <a href="#searchForm" class="header-toolbar__btn toolbar-btn">
                                <i class="flaticon flaticon-search"></i>
                            </a>
                        </li>
                        <li class="header-toolbar__item d-lg-none">
                            <a href="#" class="header-toolbar__btn menu-btn">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>