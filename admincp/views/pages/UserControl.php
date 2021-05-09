<!-- partial:partials/_header.html -->
<!-- partial -->

<div class="page has-sidebar-left  height-full">
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
                        <a class="nav-link" href="admincp/user"><i class="icon icon-home2"></i>Tất cả người dùng</a>
                    </li>
                    <li>
                        <a class="nav-link active"><i class="icon icon-plus-circle"></i> Thêm mới người dùng</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7 offset-md-2">
                    <?php
                    if (empty($data["detailUser"]) || isset($_GET["userID"]) == false) {
                        $userID = $fullname = $password = $username = $birthday = $email = $address = $verified = $role = '';
                    } else {
                        $rows = mysqli_fetch_array($data["detailUser"]);
                        $userID = $rows["user_id"];
                        $username = $rows["user_username"];
                        $fullname = $rows["user_fullname"];
                        $birthday = $rows["user_birthday"];
                        $email = $rows["user_email"];
                        $address = $rows["user_address"];
                        $verified = $rows["user_verified"];
                        $role = $rows["user_role"];
                    }
                    ?>
                    <form method="POST" name="form-user">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h5 class="card-title">Thông tin người dùng</h5>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-2 m-0">
                                                <input id="id" name="id" placeholder="USER ID" style="cursor: not-allowed;" class="form-control r-0 light s-12" type="text" value="<?php echo $userID ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label for="username" class="col-form-label s-12"><i class="icon-user mr-2"></i>TÊN TÀI KHOẢN</label>
                                                <input id="username" name="username" placeholder="Nhập tên tài khoản" class="form-control r-0 light s-12 " value="<?php echo $username ?>" type="text">
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label for="password" class="col-form-label s-12"><i class="icon-key6 mr-2"></i>MẬT KHẨU</label>
                                                <input id="password" name="password" placeholder="8 kí tự, chữ hoa thường, kí tự đặc biệt" class="form-control r-0 light s-12 " type="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label for="fullname" class="col-form-label s-12"><i class="icon-user mr-2"></i>HỌ VÀ TÊN</label>
                                                <input id="fullname" name="fullname" placeholder="Nhập họ tên" class="form-control r-0 light s-12" value="<?php echo $fullname ?>" type="text">
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label for="password" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>NGÀY SINH</label>
                                                <input id="dob" name="dob" placeholder="Select Date of Birth" class="form-control r-0 light s-12 datePicker" data-time-picker="false" data-format-date="Y/m/d" type="date" value="<?php echo $birthday ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label for="email" class="col-form-label s-12"><i class="icon-envelope-o mr-2"></i>EMAIL</label>
                                                <input id="email" name="email" placeholder="user@email.com" class="form-control r-0 light s-12 " value="<?php echo $email ?>" type="text">
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label for="city" class="col-form-label s-12"><i class="icon-location_city mr-2"></i>THÀNH PHỐ</label>
                                                <select name="city" id="city" class="form-control r-0 light s-12">
                                                    <?php
                                                    if ($address != "") {
                                                        echo '<option value="' . $rows["province_id"] . '">' . $rows["province_title"] . '</option>';
                                                    }
                                                    ?>
                                                    <?php while ($rows = mysqli_fetch_array($data["listProvince"])) { ?>
                                                        <option value="<?php echo $rows["province_id"] ?>"> <?php echo $rows["province_title"] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <!-- <div class="form-group col-6 m-0">
                                                <label for="fullname" class="col-form-label s-12"><i class="icon-profile mr-2"></i>Vai trò</label>
                                                <select name="role" id="role" class="form-control r-0 light s-12">
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Customer">Customer</option>
                                                </select>
                                            </div> -->
                                            <div class="form-group col-6 m-0">
                                                <label for="dob" class="col-form-label s-12">Vai trò</label>
                                                <br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="Customer" name="role" value="Customer" class="custom-control-input" <?php if ($role == "Customer") echo "checked" ?>>
                                                    <label class="custom-control-label m-0" for="Customer">Customer</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="Administrator" name="role" value="Administrator" class="custom-control-input" <?php if ($role == "Administrator") echo "checked" ?>>
                                                    <?php
                                                    // if ($role == "Administrator") {
                                                    //     echo '<input type="radio" id="Administrator" name="role" value="Administrator" class="custom-control-input"  checked>';
                                                    // } else {
                                                    //     echo '<input type="radio" id="Administrator" name="role" value="Administrator" class="custom-control-input">';
                                                    // }
                                                    ?>
                                                    <!-- <input type="radio" id="Administrator" name="role" value="Administrator" class="custom-control-input"> -->
                                                    <label class="custom-control-label m-0" for="Administrator">Administrator</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label for="dob" class="col-form-label s-12">Trạng thái</label>
                                                <br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="active" name="status" value="1" class="custom-control-input" <?php if ($verified == 1) echo "checked" ?>>
                                                    <label class="custom-control-label m-0" for="active">Kích hoạt</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="inactive" name="status" value="0" class="custom-control-input" <?php if ($verified == 0) echo "checked" ?>>
                                                    <label class="custom-control-label m-0" for="inactive">Chưa kích hoạt</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div><?php echo $data["resultMessage"] ?></div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <button type="submit" name="addUser" id="addUser" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Lưu Thông Tin Người Dùng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- partial:partials/_foot.html -->
<!-- partial -->