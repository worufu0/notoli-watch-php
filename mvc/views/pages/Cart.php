<!-- Breadcrumb area Start -->
<?php $priceTotal = json_decode($data['itemTotalPrice']) ?>
<div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                    <h1 class="page-title">Giỏ hàng</h1>
                    <ul class="breadcrumb">
                        <li><a href="home">Trang chủ</a></li>
                        <li class="current"><span>Giỏ hàng</span></li>
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
            <div class="row">
                <div class="col-lg-8 mb-md--50">
                    <form class="cart-form" action="#">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="table-content table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th class="text-left">Sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $totalPrice = 0;
                                            while($rows = mysqli_fetch_array($data["itemCart"])) {
                                                $itemID = $rows['cart_id'];
                                                $itemCartTitle = $rows['cart_prodTitle'];
                                                $itemCartQuantity = $rows['cart_quantity'];
                                                $itemPrice = $rows['cart_price'];
                                                $itemUnitPrice = $itemPrice / $itemCartQuantity;
                                                $itemImage = $rows['prod_image'];
                                                $totalPrice = $totalPrice + $rows['cart_price'];
                                                $itemMax = $rows['prod_quantity'];
                                            ?>
                                            <tr>
                                                <td class="product-remove text-left">
                                                    <a id="<?php echo $itemID ?>" class="removeItem"><i
                                                            class="flaticon flaticon-cross"></i></a>
                                                </td>
                                                <td class="product-thumbnail text-left">
                                                    <img src="./public/assets/img/products/<?php echo $itemImage ?>"
                                                        alt="Product Thumnail" style="max-width: 80%">
                                                </td>
                                                <td class="product-name text-left wide-column">
                                                    <h3>
                                                        <a href="product-details.html"><?php echo $itemCartTitle ?></a>
                                                    </h3>
                                                </td>
                                                <td class="product-price">
                                                    <span class="product-price-wrapper">
                                                        <span
                                                            class="money"><?php echo number_format($itemUnitPrice, 0, '', '.') ?>
                                                            ₫</span>
                                                    </span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity quantity-cart">
                                                        <input type="number" class="quantity-input quantity-load" name="qty"
                                                            id=<?php echo $itemID ?> id="qty-1"
                                                            value="<?php echo $itemCartQuantity ?>" min="1"
                                                            max="<?php echo $itemMax ?>">
                                                    </div>
                                                </td>
                                                <td class="product-total-price">
                                                    <span class="product-price-wrapper">
                                                        <span class="money"
                                                            id="price-<?php echo $itemID ?>"><?php echo number_format($itemPrice, 0, '', '.') ?>
                                                            ₫</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row no-gutters border-top pt--20 mt--20">
                            <div class="col-sm-6">
                                <div class="coupon">
                                    <input type="text" id="coupon" name="coupon" class="cart-form__input"
                                        placeholder="Coupon Code">
                                    <button type="submit" class="cart-form__btn">Apply Coupon</button>
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-right">
                                <button type="submit" class="cart-form__btn">Clear Cart</button>
                                <button type="submit" class="cart-form__btn">Update Cart</button>
                            </div>
                        </div> -->
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="cart-collaterals">
                        <div class="cart-totals">
                            <h5 class="font-size-14 font-bold mb--15">Thanh toán</h5>
                            <div class="cart-calculator">
                                <div class="cart-calculator__item">
                                    <div class="cart-calculator__item--head">
                                        <span>Tạm tính</span>
                                    </div>
                                    <div class="cart-calculator__item--value">
                                        <span id="priceTotal"><?php echo number_format($priceTotal, 0, '', '.') ?>
                                            ₫</span>
                                    </div>
                                </div>
                                <div class="cart-calculator__item">
                                    <div class="cart-calculator__item--head">
                                        <span>Phụ phí</span>
                                    </div>
                                    <div class="cart-calculator__item--value">
                                        <span>0 ₫</span>
                                        <!-- <div class="shipping-calculator-wrap">
                                            <a href="#shipping_calculator" class="expand-btn">Địa chỉ giao hàng</a>
                                            <form id="shipping_calculator"
                                                class="form shipping-calculator-form hide-in-default">
                                                <div class="form__group">
                                                    <select id="calc_shipping_country" name="calc_shipping_country"
                                                        class="nice-select form__input--select form__input--2">
                                                        <option value="">Chọn tỉnh</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD" selected="selected">Bangladesh</option>
                                                        <option value="BD">Brazil</option>
                                                        <option value="CN">China</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="FR">France</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="RU">Russia</option>
                                                        <option value="KR">South Korea</option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom (UK)</option>
                                                        <option value="US">United States (US)</option>
                                                    </select>
                                                </div>

                                                <div class="form__group">
                                                    <select id="calc_shipping_district" name="calc_shipping_district"
                                                        class="nice-select form__input--select form__input--2">
                                                        <option value="">Select a District…</option>
                                                        <option>BARISAL</option>
                                                        <option>BHOLA</option>
                                                        <option>BANDARBAN</option>
                                                        <option>BRAHMANBARIA</option>
                                                        <option>CHANDPUR</option>
                                                        <option>CHITTAGONG</option>
                                                        <option>COMILLA</option>
                                                        <option>COX'S BAZAR</option>
                                                        <option>DHAKA</option>
                                                        <option>FARIDPUR</option>
                                                        <option>FENI</option>
                                                        <option>GAZIPUR</option>
                                                        <option>GOPALGANJ</option>
                                                        <option>JAMALPUR</option>
                                                        <option>KHAGRACHHARI</option>
                                                        <option>KISHOREGONJ</option>
                                                        <option>LAKSHMIPU</option>
                                                        <option>RMADARIPUR</option>
                                                        <option>MUNSHIGANJ</option>
                                                        <option>MYMENSINGH</option>
                                                        <option>NARAYANGANJ</option>
                                                        <option>NARSINGDI</option>
                                                        <option>NETRAKONA</option>
                                                        <option>NOAKHALI</option>
                                                        <option>RANGAMATI </option>
                                                        <option>RAJBARI</option>
                                                        <option>SHARIATPUR</option>
                                                        <option>SHERPUR</option>
                                                        <option>TANGAIL</option>
                                                    </select>
                                                </div>

                                                <div class="form__group mb--10 mb-sm--15">
                                                    <input type="text" name="calc_shipping_city" id="calc_shipping_city"
                                                        class="form__input form__input--2" placeholder="Town / City">
                                                </div>

                                                <div class="form__group mb--10 mb-sm--15">
                                                    <input type="text" name="calc_shipping_zip" id="calc_shipping_zip"
                                                        class="form__input form__input--2" placeholder="Postcode / Zip">
                                                </div>

                                                <div class="form__group">
                                                    <input type="submit" value="Update Totals"
                                                        class="btn-submit btn-submit--small">
                                                </div>
                                            </form>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="cart-calculator__item order-total">
                                    <div class="cart-calculator__item--head">
                                        <span>Thành tiền</span>
                                    </div>
                                    <div class="cart-calculator__item--value">
                                        <span class="product-price-wrapper">
                                            <span class="money"
                                                id="lastPrice"><?php echo number_format($priceTotal, 0, '', '.') ?>
                                                ₫</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="checkout" class="btn btn-fullwidth btn-bg-red btn-color-white btn-hover-2">
                            Tiến hành thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->