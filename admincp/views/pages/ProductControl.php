<!-- partial:partials/_header.html -->
<!-- partial -->
<div class="page has-sidebar-left">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        Products
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                        <a class="nav-link" href="admincp/product"><i class="icon icon-list"></i>All Products</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="admincp/productcontrol"><i class="icon icon-plus-circle"></i> Add New Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <form id="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <?php
                    $prod_id = $prod_title = $prod_cat = $prod_brand = $prod_price = $prod_quantity = $prod_origin = $prod_tinydes = $prod_fulldes = '';
                    $prod_image = "avatar.png";
                    if (isset($_GET["product"])) {
                        $rows = mysqli_fetch_array($data["detailProduct"]);
                        $prod_id = $rows["prod_id"];
                        $prod_title = $rows["prod_title"];
                        $prod_cat = $rows["prod_cat"];
                        $prod_brand = $rows["prod_brand"];
                        $prod_price = $rows["prod_price"];
                        $prod_quantity = $rows["prod_quantity"];
                        $prod_origin = $rows["prod_origin"];
                        $prod_image = $rows["prod_image"];
                        $prod_tinydes = htmlspecialchars_decode($rows["prod_tinydes"]);
                        $prod_fulldes = htmlspecialchars_decode($rows["prod_fulldes"]);
                    }
                    ?>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product ID</label>
                                <input type="text" value="<?php echo $prod_id ?>" class="form-control" style="cursor: not-allowed;" id="productID" name="productID" placeholder="Product ID" readonly>
                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom01">Tên sản phẩm</label>
                                <input type="text" value="<?php echo $prod_title ?>" class="form-control" id="productTitle" name="productTitle" placeholder="Tên sản phẩm" required>
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp tên sản phẩm hợp lệ.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category">Loại</label>
                                <select id="category" name="category" class="custom-select form-control" required>
                                    <option value="">Chọn loại đồng hồ</option>
                                    <?php while ($rows = mysqli_fetch_array($data["listCategory"])) {
                                        $itemID = $rows['cat_id'];
                                        $itemTitle = $rows['cat_title'];
                                    ?>
                                        <option value="<?php echo $itemID ?>" <?php if ($itemID == $prod_cat) echo "selected" ?>><?php echo $itemTitle ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp loại đồng hồ hợp lệ.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="brand">Nhà sản xuất</label>
                                <select id="brand" name="brand" class="custom-select form-control" required>
                                    <option value="">Chọn nhà sản xuất</option>
                                    <?php while ($rows = mysqli_fetch_array($data["listBrand"])) {
                                        $itemID = $rows['brand_id'];
                                        $itemTitle = $rows['brand_title'];
                                    ?>
                                        <option value="<?php echo $itemID ?>" <?php if ($itemID == $prod_brand) echo "selected" ?>><?php echo $itemTitle ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp nhà sản xuất hợp lệ.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom04">Giá</label>
                                <input type="number" class="form-control" min=0 name="price" id="price" placeholder="Giá bán" value="<?php echo $prod_price ?>" required>
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp giá hợp lệ.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sku">Số lượng</label>
                                <input type="number" class="form-control" min=0 name="qty" id="qty" placeholder="Số lượng sản phẩm" value="<?php echo $prod_quantity ?>" required>
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp số lượng hợp lệ.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="origin">Xuất xứ</label>
                                <input type="text" class="form-control" name="origin" id="origin" placeholder="Nơi xuất xứ" value="<?php echo $prod_origin ?>" required>
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp xuất xứ hợp lệ.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productDetails">Mô tả rút gọn</label>
                            <textarea id="editor" name="editor" placeholder="Mô tả chi tiết sản phẩm" rows="17" required>
                            <?php echo $prod_tinydes ?>
                            </textarea>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor'))
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>

                            <div class="invalid-feedback">
                                Vui lòng cung cấp loại đồng hồ hợp lệ.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productDetails">Mô tả chi tiết</label>
                            <textarea id="editorFull" name="editorFull" placeholder="Mô tả chi tiết sản phẩm" rows="17" required>
                            <?php echo $prod_fulldes ?>
                            </textarea>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editorFull'))
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
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
                            <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple <?php if (!isset($_GET["product"])) echo "required" ?>>
                            <label class="custom-file-label" for="chooseFile">Chọn hình ảnh</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ảnh đại diện sản phẩm</label>

                            <div class="avatar-wrapper">
                                <img class="profile-pic" src="./public/assets/img/products/<?php echo $prod_image ?>" />
                                <div class="upload-button">
                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                </div>
                                <input class="file-upload" type="file" name="avatar" accept="image/*" <?php if (!isset($_GET["product"])) echo "required" ?> />
                            </div>
                        </div>
                        <?php if (isset($_GET["product"])) {
                        ?>
                            <div class="form-group">
                                <label>Album hình ảnh sản phẩm</label>
                                <div id="uploaded_images">
                                    <?php while ($rows = mysqli_fetch_array($data["listAlbum"])) {
                                        $photo_id = $rows["photo_id"];
                                        $photo_name = $rows["photo_name"];
                                    ?>
                                        <div class="uploaded_image">
                                            <img src="./public/assets/img/products/<?php echo $photo_name ?>">
                                            <a id="<?php echo $photo_id ?>" class="img_rmv btn"><i class="icon-delete" style="font-size:48px;color:#2B78FB"></i></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <select style="display: none;" id="deleted_images" name="deleted_images[]" multiple></select>
                        <?php }
                        ?>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <button type="submit" name="addProduct" id="addProduct" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Lưu Thông Sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- partial:partials/_foot.html -->
<!-- partial -->
<script>
    $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#chooseFile').on('change', function() {
            multiImgPreview(this, 'div.imgGallery');
        });
    });
</script>