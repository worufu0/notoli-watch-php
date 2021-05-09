<!-- partial:partials/_header.html -->
<!-- partial -->
<div class="page has-sidebar-left">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        Danh mục sản phẩm
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                        <a class="nav-link" href="admincp/categories"><i class="icon icon-list"></i>Tất cả danh mục sản phẩm</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="admincp/categoriescontrol"><i class="icon icon-plus-circle"></i>Thêm mới danh mục sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort go">
            <div class="row my-3">
                <div class="col-md-7 offset-md-2">
                    <form method="POST" action="" name="form-user">
                        <div class="card no-b no-r">
                            <div class="card-body">
                                <h5 class="card-title">Thông tin danh mục</h5>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-2 m-0">
                                                <?php
                                                if (isset($_GET["catid"])) {
                                                    $rows = mysqli_fetch_array($data["detailCat"]);
                                                    $id = $rows["cat_id"];
                                                    $title = $rows["cat_title"];
                                                } else {
                                                    $id = $title = '';
                                                }
                                                ?>
                                                <label for="id" class="col-form-label s-12">CATEGORY ID</label>
                                                <input id="id" name="id" placeholder="CAT ID" value="<?php echo $id ?>" style="cursor: not-allowed;" class="form-control r-0 light s-12" type="text" value="" readonly="">
                                            </div>
                                            <div class="form-group col-10 m-0">
                                                <label for="title" class="col-form-label s-12">TÊN DANH MỤC</label>
                                                <input id="title" name="title" placeholder="Tên danh mục" value="<?php echo $title ?>" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <button type="submit" name="addCategory" id="addCategory" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Lưu Thông Tin Danh Mục</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- partial:partials/_foot.html -->
    <!-- partial -->