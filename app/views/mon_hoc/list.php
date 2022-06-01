<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý môn học</h4>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Mã môn học</th>
                            <th>Tên môn học</th>
                            <th>Mô tả</th>
                            <th><a href="<?= BASE_URL . '/mon-hoc/create'; ?>"><button class="btn btn-primary">Thêm mới môn học</button></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ds_mon as $a) : ?>
                            <tr>
                                <td><?= 'MH-' . $a->id; ?></td>
                                <td><?= $a->ten_mon_hoc; ?></td>
                                <td><?= $a->mo_ta; ?></td>
                                <td>
                                    <a href="<?= BASE_URL . '/mon-hoc/edit?id=' . $a->id; ?>"><button class="btn btn-info">Sửa</button></a>
                                    <span class="text-center">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $a->id; ?>">Xóa</button>
                                        <div class="modal fade " id="exampleModal<?= $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn có chắc muốn xóa môn học <?= $a->ten_mon_hoc; ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success btn_delete" data-id="<?= $a->id; ?>">Đồng ý</button>
                                                        <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    const btns = document.querySelectorAll('.btn_delete');
    btns.forEach(item => {
        item.addEventListener('click', () => {
            const {
                id
            } = item.dataset;
            showSwal('success-message');
            setTimeout(function() {
                document.location = 'http://localhost/projects/quan_ly_sinh_vien/mon-hoc/delete?id=' + (+id);
            }, 1200);
        });
    })
</script>