<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="http://localhost/notoli/">
    <title>Notoli Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="./public/assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./public/assets/img/icon.png">
    <!-- ************************* CSS Files ************************* -->

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./public/assets/css/vendor.css">

    <!-- style css -->
    <link rel="stylesheet" href="./public/assets/css/main.css">
    <link rel="stylesheet" href="./public/assets/css/dev.css">

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
</head>

<body>
    <!-- Custom alert Start -->
    <div class="popup_box">
        <i class="fa fa-exclamation"></i>
        <h1 class="popup_box--h1">Vui lòng nhập thông tin chính đầy đủ và chính xác</h1>
        <label>Bạn muốn tiếp tục?</label>
        <div class="btns">
            <!-- <a class="btn1">Đóng</a> -->
            <input type="button" value="Đóng" class="btn btn-submit btn-style-1" id="btn-close" />
        </div>
    </div>
    <!-- Custom alert End -->


    <!-- Preloader Start -->
    <div class="zakas-preloader active">
        <div class="zakas-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="zakas-child zakas-bounce1"></div>
            <div class="zakas-child zakas-bounce2"></div>
            <div class="zakas-child zuka-bounce3"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <!-- Header Start -->
        <?php require_once APPLICATION_PATH . "/mvc/views/blocks/header.php" ?>
        <!-- Header End -->

        <!-- Breadcrumb area Start -->

        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->

        <!-- register -->
        <?php require_once APPLICATION_PATH . "/mvc/views/pages/" . $data["page"] . ".php" ?>



        <!-- Main Content Wrapper Start -->

        <!-- Footer Start-->
        <?php require_once APPLICATION_PATH . "/mvc/views/blocks/footer.php" ?>

        <!-- Footer End-->

        <!-- Searchform Popup Start -->
        <?php require_once APPLICATION_PATH . "/mvc/views/blocks/search.php" ?>

        <!-- Searchform Popup End -->

        <!-- Mini Cart Start -->
        <?php require_once APPLICATION_PATH . "/mvc/views/blocks/miniCart.php" ?>

        <!-- Mini Cart End -->

        <!-- Global Overlay Start -->
        <div class="zakas-global-overlay"></div>
        <!-- Global Overlay End -->

        <?php require_once APPLICATION_PATH . "/mvc/views/blocks/quickView.php" ?>

        <!-- Qicuk View Modal End -->
    </div>
    <!-- Main Wrapper End -->


    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="./public/assets/js/vendor.js"></script>

    <!-- Main JS -->
    <script src="./public/assets/js/main.js"></script>
    <script src="./public/assets/js/plugin.js"></script>
    <script src="./public/assets/js/product.js"></script>
    <!-- <script src="./public/assets/js/dev.js"></script> -->


    <!-- <script src="./public/assets/js/utils/register.js"></script> -->

    <div id="screen_lock"></div>
</body>

</html>