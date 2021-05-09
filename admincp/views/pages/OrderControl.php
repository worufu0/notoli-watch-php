<!-- partial:partials/_header.html -->
<!-- partial -->
<div class="page has-sidebar-left">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        Đon đặt hàng
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                        <a class="nav-link active" href="admincp/order"><i class="icon icon-list"></i>Tất cả đơn đặt hàng</a>
                    </li>
                    <li>
                        <a class="nav-link" href="admincp/ordercontrol"><i class="icon icon-plus-circle"></i>Thêm mới đơn đặt hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort go">
            <form id="needs-validation" method="POST" enctype="multipart/form-data" novalidate="">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Order ID</label>
                                <input type="text" value="" class="form-control" style="cursor: not-allowed;" id="orderID" name="orderID" placeholder="Order ID" readonly="">
                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom01">Username</label>
                                <select id="username" name="username" class="custom-select form-control" required="">
                                    <option value="">Chọn người dùng</option>
                                    <?php while ($rows = mysqli_fetch_array($data["listUser"])) {
                                        $user_id = $rows["user_id"];
                                        $user_fullname = $rows["user_username"];
                                    ?>
                                        <option value="<?php echo $user_id ?>"> <?php echo $user_fullname ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="product">Sản phẩm trong cửa hàng</label>
                                <select id="product" name="product" class="custom-select form-control" required="">
                                    <?php while ($rows = mysqli_fetch_array($data["listProd"])) {
                                        $prod_id = $rows["prod_id"];
                                        $prod_title = $rows["prod_title"];
                                    ?>
                                        <option value="<?php echo $prod_id ?>"> <?php echo $prod_title ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp loại đồng hồ hợp lệ.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="brand">Nhà sản xuất</label>
                                <select id="brand" name="brand" class="custom-select form-control" required="">
                                    <option value="">Chọn nhà sản xuất</option>
                                    <option value="1">Rolex</option>
                                    <option value="2">Apple</option>
                                    <option value="3">Casio</option>
                                    <option value="4">Omega</option>
                                    <option value="5">Citizen</option>
                                    <option value="6">Orient</option>
                                    <option value="8">Samsung</option>
                                </select>
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp nhà sản xuất hợp lệ.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom04">Giá</label>
                                <input type="number" class="form-control" min="0" name="price" id="price" placeholder="Giá bán" value="" required="">
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp giá hợp lệ.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sku">Số lượng</label>
                                <input type="number" class="form-control" min="0" name="qty" id="qty" placeholder="Số lượng sản phẩm" value="" required="">
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp số lượng hợp lệ.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="origin">Xuất xứ</label>
                                <input type="text" class="form-control" name="origin" id="origin" placeholder="Nơi xuất xứ" value="" required="">
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp xuất xứ hợp lệ.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <script>
                            (function() {
                                "use strict";
                                window.addEventListener("load", function() {
                                    var form = document.getElementById("needs-validation");
                                    form.addEventListener("submit", function(event) {
                                        if (form.checkValidity() == false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add("was-validated");
                                        var editorElement = document.getElementById("productDetails");
                                        if (editorElement.value == '') {
                                            editorElement.parentNode.classList.add("is-invalid");
                                            editorElement.parentNode.classList.remove("is-valid");
                                        } else {
                                            editorElement.parentNode.classList.remove("is-invalid");
                                            editorElement.parentNode.classList.add("is-valid");
                                        }

                                    }, false);
                                }, false);
                            }());
                        </script>
                        <label>Thêm ảnh vào ablbum</label>
                        <div class="user-image mb-3 text-center">
                            <div class="imgGallery">
                                <!-- Image preview -->
                            </div>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple="" required="">
                            <label class="custom-file-label" for="chooseFile">Chọn hình ảnh</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ảnh đại diện sản phẩm</label>

                            <div class="avatar-wrapper" style="height: 326.328px;">
                                <img class="profile-pic" src="./public/assets/img/products/avatar.png">
                                <div class="upload-button">
                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                </div>
                                <input class="file-upload" type="file" name="avatar" accept="image/*" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <button type="submit" name="addProduct" id="addProduct" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Lưu Thông Sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
    <!-- partial:partials/_foot.html -->
    <!-- partial -->