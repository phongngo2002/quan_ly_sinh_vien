<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý khoa</h4>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khoa</th>
                            <th>Số điện thoại</th>
                            <th><a href="<?= BASE_URL . '/khoa/create'; ?>"><button class="btn btn-primary">Thêm mới khoa</button></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($ds_khoa as $a) : ?>

                            <tr>
                                <td><?= $i;?></td>
                                <td><?= $a->ten_khoa; ?></td>
                                <td><?= $a->dien_thoai; ?></td>
                                <td>
                                    <a href="<?= BASE_URL . '/khoa/edit?id=' . $a->id; ?>"><button class="btn btn-info">Sửa</button></a>
                                    <span>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?= $a->id; ?>">Xóa</button>
                                        <div class="modal fade" id="exampleModal<?= $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn có chắc muốn xóa khoa <?= $a->ten_khoa; ?></p>
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
                document.location = 'http://localhost/projects/quan_ly_sinh_vien/khoa/delete?id=' + (+id);
            }, 1200);
        });
    })
</script>