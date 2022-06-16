<header class="header navbar-area">
    <!-- Toolbar Start -->
    <div class="toolbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="toolbar-social">
                        <ul>
                            <li><span class="title">Liên hệ với chúng tôi : </span></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="toolbar-login">
                        <div class="button">
                            <?= isset($user) ?   '<a href="" class="btn btn-primary">Hello ' . $user->ho_dem . ' ' . $user->ten . '</a> <a href="' . BASE_URL . '/logout?sv' . '" class="btn">Đăng xuất</a>' :  '  <a href="' . BASE_URL . '/login' . '" class="btn">Đăng nhập</a>' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Toolbar End -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="<?= BASE_URL . '/public/client'; ?>/images/logo/logo.svg" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="active" href="index.html">Trang chủ</a></li>
                                <li class="nav-item"><a href="javascript:void(0)">Môn học</a></li>
                                <li class="nav-item"><a href="javascript:void(0)">Sự kiện</a></li>
                                <li class="nav-item">
                                    <a href="about-us.html">Giới thiệu</a>
                                </li>
                                <li class="nav-item"><a href="<?= BASE_URL . '/bang-diem'; ?>">Bảng điểm của bạn</a></li>
                                <li class="nav-item"><a href="javascript:void(0)">Liên hệ</a></li>
                            </ul>
                            <form class="d-flex search-form">
                                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>