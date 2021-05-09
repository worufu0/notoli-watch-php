<!-- partial:partials/_header.html -->
<!-- partial -->

<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-users"></i>
                        Thông tin người dùng
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Tất cả người dùng</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link" href="admincp/usercontrol"><i class="icon icon-plus-circle"></i>Thêm mới người dùng</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">

                        <div class="card r-0 shadow">
                            <div class="card-header white">
                                <form method="GET" action="" name="formSearch" id="formSearch">
                                    <div class="form-group has-right-icon m-0">
                                        <input class="form-control light r-30" name="search" placeholder="Tìm kiếm tên người dùng" type="text">
                                        <i type="submit" class="icon-search submitSearch"></i>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <div>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                            <tr class="no-b">
                                                <th>ID</th>
                                                <th>USER NAME</th>
                                                <th>HỌ VÀ TÊN</th>
                                                <th>THÀNH PHỐ</th>
                                                <th>NGÀY SINH</th>
                                                <th>QUYỀN</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php while ($rows = mysqli_fetch_array($data["listUsers"])) {
                                                $user_id = $rows["user_id"];
                                                $user_fullname = $rows["user_fullname"];
                                                $user_username = $rows["user_username"];
                                                $user_email = $rows["user_email"];
                                                $user_address = $rows["province_title"];
                                                $user_birthday = $rows["user_birthday"];
                                                $user_role = $rows["user_role"];
                                            ?>

                                                <tr>
                                                    <td><?php echo $user_id ?></td>

                                                    <td>
                                                        <div>
                                                            <div>
                                                                <strong><?php echo $user_username ?></strong>
                                                            </div>
                                                            <small><?php echo $user_email ?></small>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $user_fullname ?></td>

                                                    <td><?php echo $user_address ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($user_birthday)) ?></td>
                                                    <?php
                                                    if ($user_role == "Administrator") {
                                                        echo '<td><span class="r-3 badge badge-success ">Administrator</span></td>';
                                                    } else {
                                                        echo '<td><span class="r-3 badge badge-warning ">Customer</span></td>';
                                                    }
                                                    ?>
                                                    <td class="a">
                                                        <form action="" method="POST" id="submitDel<?php echo $user_id ?>" name="submitDel<?php echo $user_id ?>">
                                                            <a href="./admincp/user" class="delUser"><i class="icon-trash-can4 mr-3"></i></a>
                                                            <input type="text" name="idDel" value="<?php echo $user_id ?>" style="display: none;" />
                                                            <a href="./admincp/usercontrol?userID=<?php echo $user_id ?>"><i class="icon-pencil"></i></a>
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

                <!-- <nav class="my-3" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="panel-page-users-create.html" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>
</div>
<!-- partial:partials/_foot.html -->
<!-- partial -->