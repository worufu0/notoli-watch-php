<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="./publicAdmin/assets/img/basic/logo.png" alt="">
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false" aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="./publicAdmin/assets/img/dummy/u2.png" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1"><?php echo $_SESSION['username'] ?></h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="#" class="list-group-item list-group-item-action"><i class="mr-2 icon-cogs text-yellow"></i>Settings</a>
                        <a href="./admincp/logout" class="list-group-item list-group-item-action"><i class="mr-2 icon-security text-purple"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MAIN NAVIGATION</strong></li>
            <li class="treeview"><a href="#"><i class="icon icon icon-package blue-text s-18"></i>Sản phẩm<i class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="admincp/product"><i class="icon icon-circle-o"></i>Tất sản phẩm</a></li>
                    <li><a href="admincp/productcontrol"><i class="icon icon-add"></i>Thêm sản phẩm mới</a></li>
                </ul>
            </li>
            <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Người dùng<i class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="admincp/user"><i class="icon icon-circle-o"></i>Tất cả người dùng</a>
                    </li>
                    <li><a href="admincp/usercontrol"><i class="icon icon-add"></i>Thêm người dùng mới</a>
                    </li>
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="icon icon-sailing-boat-water purple-text s-18"></i>Danh mục sản phẩm<i class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="admincp/categories"><i class="icon icon-circle-o"></i>Tất cả danh mục</a>
                    </li>
                    <li><a href="admincp/categoruescontrol"><i class="icon icon-add"></i>Thêm người danh mục</a>
                    </li>
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="icon icon-cogs text-yellow s-18"></i>Nhà sản xuất<i class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="admincp/brand"><i class="icon icon-circle-o"></i>Tất cả nhà sản xuất</a>
                    </li>
                    <li><a href="admincp/brandcontrol"><i class="icon icon-add"></i>Thêm nhà sản xuất</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
<!--Sidebar End-->