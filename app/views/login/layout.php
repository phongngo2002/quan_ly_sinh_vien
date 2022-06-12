<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Victory Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>\public\vendors\mdi\css\materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>\public\vendors\simple-line-icons\css\simple-line-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>\public\vendors\flag-icon-css\css\flag-icon.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>\public\vendors\css\vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>\public\css\style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= BASE_URL; ?>\public\images\favicon.png">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <div class="row">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-dark text-left p-5">
                                <h2>Đăng nhập hệ thống VIN SCHOOL</h2>
                                <?=
                                isset($_GET['loi-dang-nhap'])
                                    ?
                                    '<h3 class="alert alert-fill-danger"><i class="mdi mdi-alert-circle"></i> Đăng nhập thất bại</h3>'
                                    :
                                    ''
                                ?>
                                <form class="pt-2" method="POST" action="<?= BASE_URL . '/save-login'; ?>">
                                    <div class="form-group">
                                        <label for="ten_tai_khoan">Tên đăng nhập</label>
                                        <input type="text" class="form-control" id="ten_tai_khoan" name="ten_tai_khoan" placeholder="Tên đăng nhập">
                                        <i class="mdi mdi-account"></i>
                                    </div>
                                    <div class="form-group">
                                        <label for="mat_khau">Mật khẩu</label>
                                        <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật khẩu">
                                        <i class="mdi mdi-eye"></i>
                                    </div>
                                    <div class="mt-5">
                                        <button class="btn btn-block btn-warning btn-lg font-weight-medium">Đăng Nhập</button>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <a href="#" class="auth-link text-white">Quên mật khẩu?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= BASE_URL; ?>\public\vendors\js\vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= BASE_URL; ?>\public\js\off-canvas.js"></script>
    <script src="<?= BASE_URL; ?>\public\js\hoverable-collapse.js"></script>
    <script src="<?= BASE_URL; ?>\public\js\misc.js"></script>
    <script src="<?= BASE_URL; ?>\public\js\settings.js"></script>
    <script src="<?= BASE_URL; ?>\public\js\todolist.js"></script>
    <!-- endinject -->
</body>

</html>