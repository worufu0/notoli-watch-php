       <?php
        //Lấy thông tin cơ bản của sản phẩm           
        $rows = mysqli_fetch_array($data["itemDetails"]);
        $prod_id = $rows["prod_id"];
        $prod_title = $rows["prod_title"];
        $prod_cat = $rows["prod_cat"];
        $prod_brand = $rows["prod_brand"];
        $prod_price    = $rows["prod_price"];
        $prod_price = number_format($prod_price, 0, '', '.');
        $prod_quantity = $rows["prod_quantity"];
        $prod_view = $rows["prod_view"];
        $prod_tinydes = $rows["prod_tinydes"];
        $prod_fulldes = $rows["prod_fulldes"];
        $prod_image = $rows["prod_image"];
        $prod_date = $rows["prod_date"];
        $prod_origin = $rows["prod_origin"];

        $listPhoto = array();
        while ($rowPhotos = mysqli_fetch_array($data["listPhotoDetails"])) {
            array_push($listPhoto, $rowPhotos["photo_name"]);
        }
        //Tên thương hiệu
        $titleBrand = json_decode($data["titleBrand"]);
        //Số lượng tồn kho
        $itemSold = json_decode($data["itemSold"]);
        ?>
       <!-- Breadcrumb area Start -->
       <div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                           <h1 class="page-title">Sản phẩm</h1>
                           <ul class="breadcrumb">
                               <li><a href="./home">Trang chủ</a></li>
                               <li class="current"><span>Chi tiết sản phẩm</span></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Breadcrumb area End -->

       <!-- Main Content Wrapper Start -->
       <div class="main-content-wrapper">
           <div class="page-content-inner ptb--80">
               <div class="container">
                   <div class="row no-gutters mb--80">
                       <div class="col-lg-7 product-main-image">
                           <div class="product-image">
                               <div class="product-gallery vertical-slide-nav">
                                   <div class="product-gallery__large-image mb-md--30">
                                       <div class="product-gallery__wrapper">
                                           <div class="zakas-element-carousel main-slider image-popup" data-slick-options='{
                                                "slidesToShow": 1,
                                                "slidesToScroll": 1,
                                                "infinite": true,
                                                "arrows": false, 
                                                "asNavFor": ".nav-slider"
                                            }'>
                                               <?php
                                                foreach ($listPhoto as $item) {
                                                ?>
                                                   <figure class="product-gallery__image zoom">
                                                       <img src="./public/assets//img/products/<?php echo $item ?>" alt="Product">
                                                       <div class="product-gallery__actions">
                                                           <button class="action-btn btn-zoom-popup"><i class="fa fa-eye"></i></button>
                                                       </div>
                                                   </figure>
                                               <?php } ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="product-gallery__nav-image dev-gallery">
                                       <div class="zakas-element-carousel nav-slider slick-vertical product-slide-nav" data-slick-options='{
                                            "spaceBetween": "10px",
                                            "slidesToShow": 3,
                                            "slidesToScroll": 1,
                                            "vertical": true,
                                            "swipe": true,
                                            "verticalSwiping": true,
                                            "infinite": true,
                                            "focusOnSelect": true,
                                            "asNavFor": ".main-slider",
                                            "arrows": true, 
                                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-up" },
                                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-down" }
                                        }' data-slick-responsive='[
                                            {
                                                "breakpoint":767, 
                                                "settings": {
                                                    "slidesToShow": 4,
                                                    "vertical": false
                                                } 
                                            },
                                            {
                                                "breakpoint":575, 
                                                "settings": {
                                                    "slidesToShow": 3,
                                                    "vertical": false
                                                } 
                                            },
                                            {
                                                "breakpoint":480, 
                                                "settings": {
                                                    "slidesToShow": 2,
                                                    "vertical": false
                                                } 
                                            }
                                        ]'>
                                           <?php
                                            foreach ($listPhoto as $item) {
                                            ?>
                                               <figure class="product-gallery__nav-image--single">
                                                   <img src="./public/assets//img/products/<?php echo $item ?>" alt="Products">
                                               </figure>
                                           <?php } ?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-4 offset-xl-1 col-lg-5 product-main-details mt-md--50">
                           <div class="product-summary pl-lg--30 pl-md--0">
                               <div class="product-navigation text-right mb--20">
                                   <span><i class="fa fa-eye"></i> <?php echo $prod_view ?></span>
                               </div>
                               <h3 class="product-title mb--20"><?php echo $prod_title ?></h3>
                               <p class="product-short-description mb--20"><?php echo htmlspecialchars_decode($prod_tinydes) ?></p>
                               <div class="product-price-wrapper mb--25">
                                   <span class="money"><?php echo $prod_price ?> ₫</span>
                               </div>
                               <div class="product-action d-flex flex-sm-row align-items-sm-center flex-column align-items-start mb--30">
                                   <div class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                                       <label class="quantity-label" for="qty">Số lượng:</label>
                                       <div class="quantity">
                                           <input type="number" class="quantity-input" name="qty" id="qty" value="1" min="1">
                                       </div>
                                   </div>
                                   <!-- <button type="button" id="<?php // echo $prod_id 
                                                                    ?>" class="btn btn-small btn-bg-red btn-color-white btn-hover-2 addMultiCart"> -->
                                   <button type="button" id="<?php echo $prod_id ?>" class="btn btn-small btn-bg-red btn-color-white btn-hover-2 addMultiCart" onclick="window.location.href='cart'">
                                       Thêm vào giỏ
                                   </button>
                               </div>
                               <p><label class="quantity-label">Sản phẩm đã bán:</label><?php echo $itemSold ?> </p>
                               <p><label class="quantity-label">Còn trong kho:</label><?php echo $prod_quantity ?> </p>

                           </div>
                       </div>
                   </div>
                   <div class="row justify-content-center mb--80">
                       <div class="col-12">
                           <div class="product-data-tab tab-style-3">
                               <div class="nav nav-tabs product-data-tab__head mb--35 mb-sm--25" id="product-tab" role="tablist">
                                   <a class="product-data-tab__link nav-link active" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-selected="true">
                                       <span>Mô tả</span>
                                   </a>
                                   <a class="product-data-tab__link nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-selected="true">
                                       <span>Thông tin chi tiết</span>
                                   </a>
                               </div>
                               <div class="tab-content product-data-tab__content" id="product-tabContent">
                                   <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                                       <div class="product-description">
                                           <?php echo htmlspecialchars_decode($prod_fulldes) ?>
                                       </div>
                                   </div>
                                   <div class="tab-pane" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                                       <div class="table-content table-responsive">
                                           <table class="table shop_attributes">
                                               <tbody>
                                                   <tr>
                                                       <th>Xuất xứ</th>
                                                       <td><?php echo $prod_origin ?></td>
                                                   </tr>
                                                   <tr>
                                                       <th>Nhà sản xuất</th>
                                                       <td><?php echo $titleBrand . ' - ' . $prod_origin ?></td>
                                                   </tr>
                                                   <tr>
                                                       <th>Thương hiệu</th>
                                                       <td><?php echo $titleBrand ?></td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12">
                           <div class="zakas-element-carousel nav-vertical-center" data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-double-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-double-right" }
                            }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                    "slidesToShow": 3
                                }},
                                {"breakpoint":991, "settings": {
                                    "slidesToShow": 2
                                }},
                                {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                }}
                            ]'>
                               <?php
                                //****** Sản phẩm cùng loại *******//
                                while ($fourProduct = mysqli_fetch_array($data["showFiveProduct"])) {
                                    $id = $fourProduct["prod_id"];
                                    $title = $fourProduct["prod_title"];
                                    $image = $fourProduct["prod_image"];
                                    $price = $fourProduct["prod_price"];
                                    $price = number_format($price, 0, '', '.');
                                ?>
                                   <div class="item">
                                       <div class="zakas-product">
                                           <div class="product-inner">
                                               <figure class="product-image">
                                                   <a href="<?php echo DOMAIN ?>/product/detail/<?php echo $id ?>">
                                                       <img src="./public/assets//img/products/<?php echo $image ?>" alt="Products">
                                                   </a>
                                                   <span class="product-badge">Mới</span>
                                               </figure>
                                               <div class="product-info">
                                                   <h3 class="product-title mb--15">
                                                       <a href="product-details.html"><?php echo $title ?></a>
                                                   </h3>
                                                   <div class="product-price-wrapper mb--30">
                                                       <span class="money"><?php echo $price ?> ₫</span>
                                                   </div>
                                                   <a href="" id="<?php echo $id ?>" class="btn btn-small btn-bg-sand btn-color-dark addCart">Thêm vào giỏ</a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               <?php } ?>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Main Content Wrapper End -->