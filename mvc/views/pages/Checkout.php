<!-- Breadcrumb area Start -->
<div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                    <h1 class="page-title">Thanh toán</h1>
                    <ul class="breadcrumb">
                        <li><a href="home">Trang chủ</a></li>
                        <li class="current"><span>Thanh toán</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <!-- <div class="row pt--50 pt-md--40 pt-sm--20">

            </div> -->
            <div class="row pt--50 pb--80 pb-md--60 pb-sm--40">
                <!-- Checkout Area Start -->
                <div class="col-lg-6">
                    <div class="checkout-title mt--10">
                        <h2>Thanh toán và giao hàng</h2>
                    </div>
                    <div class="checkout-form">
                        <form action="checkout/ActionOrder" class="form form--checkout" method="POST" id="form-checkout"
                            name="form-checkout">
                            <div class="form-row mb--20">
                                <div class="form__group col-md-12">
                                    <label for="billing_name" class="form__label form__label--2">Họ và tên<span
                                            class="required">*</span></label>
                                    <input type="text" name="billing_name" id="billing_name"
                                        class="form__input form__input--2">
                                </div>
                            </div>
                            <div class="form-row mb--20">
                                <div class="form__group col-12">
                                    <label for="billing_city" class="form__label form__label--2">Tỉnh / Thành phố <span
                                            class="required">*</span></label>
                                    <input type="text" name="billing_city" id="billing_city"
                                        class="form__input form__input--2">
                                </div>
                            </div>
                            <div class="form-row mb--20">
                                <div class="form__group col-12">
                                    <label for="billing_state" class="form__label form__label--2">Quận / Huyện <span
                                            class="required">*</span></label>
                                    <input type="text" name="billing_state" id="billing_state"
                                        class="form__input form__input--2">
                                </div>
                            </div>
                            <div class="form-row mb--20">
                                <div class="form__group col-12">
                                    <label for="billing_streetAddress" class="form__label form__label--2">Địa chỉ
                                        <span class="required">*</span></label>

                                    <input type="text" name="billing_streetAddress" id="billing_streetAddress"
                                        class="form__input form__input--2">
                                </div>
                            </div>
                            <div class="form-row mb--20">
                                <div class="form__group col-12">
                                    <label for="billing_phone" class="form__label form__label--2">Số điện thoại <span
                                            class="required">*</span></label>
                                    <input type="text" name="billing_phone" id="billing_phone"
                                        class="form__input form__input--2">
                                </div>
                            </div>
                            <div class="form-row mb--20">
                                <div class="form__group col-12">
                                    <label for="billing_email" class="form__label form__label--2">Email <span
                                            class="required">*</span></label>
                                    <input type="email" name="billing_email" id="billing_email"
                                        class="form__input form__input--2">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form__group col-12">
                                    <label for="orderNotes" class="form__label form__label--2">Thông tin bổ sung</label>
                                    <textarea class="form__input form__input--2 form__input--textarea" id="orderNotes"
                                        name="orderNotes"
                                        placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6 mt-md--40">
                    <div class="order-details">
                        <div class="checkout-title mt--10">
                            <h2>Đơn hàng của bạn</h2>
                        </div>
                        <div class="table-content table-responsive mb--30">
                            <table class="table order-table order-table-2">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="text-right">Tạm tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalPrice = 0;
                                    while($rows = mysqli_fetch_array($data["itemListOrder"])) {
                                        $itemCartTitle = $rows['cart_prodTitle'];
                                        $itemCartQuantity = $rows['cart_quantity'];
                                        $itemPrice = $rows['cart_price'];
                                        $itemUnitPrice = $itemPrice / $itemCartQuantity;
                                        $totalPrice = $totalPrice + $rows['cart_price'];      
                                    
                                    ?>
                                    <tr>
                                        <th><?php echo $itemCartTitle ?>
                                            <strong><span>&#10005; </span><?php echo $itemCartQuantity?></strong>
                                        </th>
                                        <td class="text-right"><?php echo number_format($itemPrice, 0, '', '.') ?> ₫
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Tạm tính</th>
                                        <td class="text-right"><?php echo number_format($totalPrice, 0, '', '.') ?> ₫
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Giao hàng</th>
                                        <td class="text-right">
                                            <span>0 ₫</span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng</th>
                                        <td class="text-right"><span
                                                class="order-total-ammount"><?php echo number_format($totalPrice, 0, '', '.') ?>
                                                ₫</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="checkout-payment">
                            <form action="Checkout/ActionOrder" class="payment-form" method="POST" id="form-payment"
                                name="form-payment">
                                <div class="payment-group mb--10">
                                    <div class="payment-radio">
                                        <input type="radio" value="cash" name="payment-method" id="cash" checked>
                                        <label class="payment-label" for="cash">
                                            Thanh toán khi nhận hàng (COD)
                                        </label>
                                    </div>
                                </div>
                                <!-- <div class="payment-group mb--10">
                                    <div class="payment-radio">
                                        <input type="radio" value="bank" name="payment-method" id="bank">
                                        <label class="payment-label" for="cheque">Chuyển khoản ngân hàng</label>
                                    </div>
                                    <div class="payment-info" data-method="bank">
                                        <p>Chức năng hiện tại chưa phát triển</p>
                                    </div>
                                </div> -->

                            </form>

                            <div class="payment-group mt--20">
                                <button type="submit" class="btn btn-fullwidth btn-bg-red btn-color-white btn-hover-2"
                                    id="submit-checkout" name="submit-checkout">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->