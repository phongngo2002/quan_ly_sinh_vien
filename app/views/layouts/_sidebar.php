<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="<?= BASE_URL; ?>\storage\images\ba1f7ef9eb45041b5d54.jpg" alt="image">
                    <span class="online-status online"></span>
                    <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
                    <p class="name">
                       <?=  $user->ho_dem.' '.$user->ten;?>
                    </p>
                    <p class="designation">
                        Quản trị viên
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL.'/dashboard' ?>">
                <i class="icon-rocket menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <span class="badge badge-success"></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/khoa">
                <i class="icon-graduation menu-icon"></i>
                <span class="menu-title">Khoa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/lop">
                <i class="icon-home menu-icon"></i>
                <span class="menu-title">Lớp</span>
                <span class="badge badge-danger"></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/mon-hoc">
                <i class="icon-notebook menu-icon"></i>
                <span class="menu-title">Môn học</span>
                <span class="badge badge-danger"></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/sinh-vien">
                <i class="icon-user menu-icon"></i>
                <span class="menu-title">Sinh Viên</span>
                <span class="badge badge-warning"></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/quan-tri-vien">
                <i class="icon-user menu-icon"></i>
                <span class="menu-title">Quản trị viên</span>
                <span class="badge badge-warning"></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/danh-sach-diem">
                <i class="icon-calendar menu-icon"></i>
                <span class="menu-title">Danh sách điểm</span>
                <span class="badge badge-warning"></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/logout">
                <span class="menu-title">Đằng xuất</span>
                <span class="badge badge-warning"></span>
            </a>
        </li>
    </ul>
</nav>