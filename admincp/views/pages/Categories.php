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
                        <a class="nav-link active" href="admincp/categories"><i class="icon icon-list"></i>Tất cả danh mục sản phẩm</a>
                    </li>
                    <li>
                        <a class="nav-link" href="admincp/categoriescontrol"><i class="icon icon-plus-circle"></i>Thêm mới danh mục sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="row">
                <div class="col-md-12">
                    <div class="card no-b shadow">
                        <div class="card-header white">
                            <form method="GET" action="" name="formSearch" id="formSearch">
                                <div class="form-group has-right-icon m-0">
                                    <input class="form-control light r-30" name="search" placeholder="Tìm kiếm loại sản phẩm" type="text">
                                    <i type="submit" class="icon-search submitSearch"></i>
                                </div>
                            </form>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover r-0">
                                    <thead>
                                        <tr class="no-b">
                                            <th>ID</th>
                                            <th>TÊN DANH MỤC</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($rows = mysqli_fetch_array($data["listCategoris"])) {
                                            $id = $rows["cat_id"];
                                            $title = $rows["cat_title"];
                                        ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $title ?></td>
                                                <td>
                                                    <form action="" method="POST" id="submitDel<?php echo $id ?>" name="submitDel<?php echo $id ?>">
                                                        <a class="delProduct btn-fab btn-fab-sm btn-danger shadow text-white"><i class="icon-trash-can4"></i></a>
                                                        <input type="text" name="idDelCat" value="<?php echo $id ?>" style="display: none;" />
                                                        <a href="admincp/categoriescontrol?catid=<?php echo $id ?>" class="btn-fab btn-fab-sm btn-primary shadow text-white"><i class="icon-pencil"></i></a>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial:partials/_foot.html -->
    <!-- partial -->