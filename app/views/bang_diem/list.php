<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bảng Điểm</h4>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên môn học</th>
                            <th>Số sinh viên có điểm</th>
                            <th>Điểm trung bình</th>
                            <th>Tỷ lệ đạt (%)</th>
                            <th><a href="<?= BASE_URL . '/danh-sach-diem/nhap-diem'; ?>"><button class="btn btn-primary">Nhập điểm</button></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ds_diem as $a) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $a->ten_mon_hoc; ?></td>
                                <td><?= $a->tong_sv; ?></td>
                                <td> <?= round($a->dtb); ?></td>
                                <td><?= round($a->ty_le_dat * 100); ?></td>
                                <td>
                                    <a href="<?= BASE_URL . '/danh-sach-diem/chi-tiet?ma_mon_hoc=' . $a->ma_mon_hoc ?>"><button class="btn btn-warning">Chi tiết</button></a>
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