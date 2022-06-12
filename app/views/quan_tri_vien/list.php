<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý khoa</h4>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Tên đăng nhập</th>
                            <th><a href="<?= BASE_URL . '/quan-tri-vien/create'; ?>"><button class="btn btn-primary">Thêm mới tài khoản</button></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($ds_quan_tri as $a) : ?>

                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $a->ho_dem . ' ' . $a->ten; ?></td>
                                <td><?= $a->ten_tai_khoan; ?></td>
                                <td>
                                    <a href="<?= BASE_URL . '/quan-tri-vien/edit?id=' . $a->id; ?>"><button class="btn btn-info">Sửa</button></a>
                                </td>
                            </tr>
                            <?php $i += 1; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>