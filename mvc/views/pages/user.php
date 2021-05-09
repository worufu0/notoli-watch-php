<!-- partial:partials/_header.html -->
<!-- partial -->

<div class="page  has-sidebar-left height-full">

    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
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
                        <a class="nav-link" href="panel-page-users-create.html"><i class="icon icon-plus-circle"></i> Thêm mới người dùng</a>
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
                                <form>
                                    <div class="form-group has-right-icon m-0">
                                        <input class="form-control light r-30" placeholder="Tìm kiếm tên người dùng" type="text">
                                        <i class="icon-search"></i>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                            <tr class="no-b">
                                                <th>ID</th>
                                                <th>USER NAME</th>
                                                <th>PASSWORD</th>
                                                <th>HỌ VÀ TÊN</th>
                                                <th>THÀNH PHỐ</th>
                                                <th>ĐIỆN THOẠI</th>
                                                <th>NGÀY SINH</th>
                                                <th>QUYỀN</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <tr>
                                                <td>1</td>

                                                <td>
                                                    <div>
                                                        <div>
                                                            <strong>tuyenbui3030</strong>
                                                        </div>
                                                        <small> tuyenbui3030@gmail.com</small>
                                                    </div>
                                                </td>

                                                <td>**********</td>
                                                <td>Bùi Quang Tuyến</td>

                                                <td>Gia Lai</td>
                                                <td>0338218374</td>
                                                <td>26/08/1999</td>
                                                <td><span class="r-3 badge badge-success ">Administrator</span></td>
                                                <td>
                                                    <a href="panel-page-profile.html"><i class="icon-trash-can4 mr-3"></i></a>
                                                    <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="my-3" aria-label="Page navigation">
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
                </nav>
            </div>
        </div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="panel-page-users-create.html" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>
</div>
<!-- partial:partials/_foot.html -->
<!-- partial -->