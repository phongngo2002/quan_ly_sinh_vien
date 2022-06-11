<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách điểm môn <?= $mon_hoc->ten_mon_hoc; ?></h4>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã sinh viên</th>
                            <th>Họ Tên</th>
                            <th>Điêm lần 1</th>
                            <th>Điêm lần 2</th>
                            <th>Điểm trung bình</th>
                            <th>Trạng thái</th>
                            <th><a href="<?= BASE_URL . '/danh-sach-diem/nhap-diem?ma_mon_hoc=' . $_GET['ma_mon_hoc']; ?>"><button class="btn btn-primary">Nhập điểm</button></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ct_diem as $a) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $a->ma_sv; ?></td>
                                <td><?= $a->ho_dem . ' ' . $a->ten; ?></td>
                                <td><?= $a->diem_lan_1 ?></td>
                                <td><?= $a->diem_lan_2; ?></td>
                                <td><?= $a->dtb; ?></td>
                                <td><?= $a->dtb < 5 ? '<span class="badge badge-danger">Trượt</span>' : '<span class="badge badge-success">Đạt</span>'; ?></td>
                                <td><a href="<?= BASE_URL . '/danh-sach-diem/sua-diem?id='.$a->id_sv.'&ma_mon_hoc=' . $_GET['ma_mon_hoc'] . '' ?>"><button class="btn btn-warning">Chỉnh sửa</button></a></td>
                            </tr>
                            <?php $i += 1; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?=BASE_URL.'/danh-sach-diem'?>"><button class="btn btn-success">Quay lại</button></a>
            </div>
        </div>
    </div>
</div>