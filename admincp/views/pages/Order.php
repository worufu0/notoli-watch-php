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
        <div class="animated fadeInUpShort">
            <div class="row">
                <div class="col-md-12">
                    <div class="card no-b shadow">
                        <div class="card-header white">
                            <form method="GET" action="" name="formSearch" id="formSearch">
                                <div class="form-group has-right-icon m-0">
                                    <input class="form-control light r-30" name="search" placeholder="Tìm kiếm tên khách hàng" type="text">
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
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($rows = mysqli_fetch_array($data["listOrder"])) {
                                            $id = $rows["order_id"];
                                            $name = $rows["order_name"];
                                            $email = $rows["order_email"];
                                            $phone = $rows["order_phone"];
                                            $address = $rows["order_address"];
                                            $amount = $rows["order_amount"];
                                        ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $name ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $phone ?></td>
                                                <td><?php echo $address ?></td>
                                                <td><span class="r-3 badge badge-warning ">Đang giao</span></td>
                                                <td><?php echo $amount ?></td>
                                                <td>
                                                    <form action="" method="POST" id="submitDel<?php echo $id ?>" name="submitDel<?php echo $id ?>">
                                                        <a class="delProduct btn-fab btn-fab-sm btn-danger shadow text-white"><i class="icon-trash-can4"></i></a>
                                                        <input type="text" name="idDelCat" value="<?php echo $id ?>" style="display: none;" />
                                                        <a href="admincp/order?orderid=<?php echo $id ?>" class="btn-fab btn-fab-sm btn-primary shadow text-white"><i class="icon-pencil"></i></a>
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