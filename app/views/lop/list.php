<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý lớp học</h4>
            <p class="card-description">
            </p>
            <div class="table-responsive">
                <div>
                    <input type="text" class="form-control" id="filter_year" name="" placeholder="Nhập năm nhập học">
                </div>
                <div class="my-2">
                    <select class="form-control" id="khoa" name="khoa">
                        <option value="0">Lựa chọn khối nghành</option>
                        <?php foreach ($ds_khoa as $a) : ?>
                            <option value="<?= $a->id ?>"><?= $a->ten_khoa; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <button class="btn btn-warning" onclick="search()">Tìm kiếm</button>
                </div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên lớp</th>
                            <th>Hệ đào tạo</th>
                            <th>Năm nhập học</th>
                            <th>Sĩ số</th>
                            <th>Khoa</th>
                            <th><a href="<?= BASE_URL . '/lop/create' ?>"><button class="btn btn-primary">Thêm mới lớp học</button></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($ds_lop as $a) : ?>

                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $a->ten_lop; ?></td>
                                <td><?= $a->he_dao_tao; ?></td>
                                <td><?= $a->nam_nhap_hoc; ?></td>
                                <td><?= $a->si_so; ?></td>
                                <td><?= $get_one_department($a->ma_khoa)->ten_khoa; ?></td>
                                <td>
                                    <a href="<?= BASE_URL . '/lop/edit?id=' . $a->id; ?>"><button class="btn btn-info">Sửa</button></a>
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
                                                        <p>Bạn có chắc muốn xóa lớp <?= $a->ten_lop; ?></p>
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
                            <?php $i += 1; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    const nam_nhap_hoc = document.getElementById('filter_year');
    const khoa = document.getElementById('khoa');

    function search() {
        let parameter_path = '';
        if (nam_nhap_hoc.value && khoa.value != 0) {
            parameter_path = '?nam_nhap_hoc=' + nam_nhap_hoc.value + '&khoa=' + khoa.value;
        } else if (nam_nhap_hoc.value && khoa.value == 0) {
            parameter_path = '?nam_nhap_hoc=' + nam_nhap_hoc.value;
        } else if (!nam_nhap_hoc.value && khoa.value != 0) {
            parameter_path = '?khoa=' + khoa.value;
        } else {
            parameter_path = '';
        }
        document.location = 'http://localhost/projects/quan_ly_sinh_vien/lop' + parameter_path;
    }
    const btns = document.querySelectorAll('.btn_delete');
    btns.forEach(item => {
        item.addEventListener('click', () => {
            const {
                id
            } = item.dataset;
            showSwal('success-message');
            setTimeout(function() {
                document.location = 'http://localhost/projects/quan_ly_sinh_vien/lop/delete?id=' + (+id);
            }, 1200);
        });
    })
</script>