<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý sinh viên</h4>
            <p class="card-description">

            </p>
            <div class="table-responsive">
                <div>
                    <button class="btn btn-dark my-3" id="btn-reset">Xóa lựa chọn</button>
                    <select class="form-control" id="lop" name="lop">
                        <option value="">Lựa chọn chuyên ngành học</option>
                        <?php foreach ($ds_khoa as $a) : ?>
                            <option value="<?= $a->id ?>" <?= isset($_GET['ma_khoa']) && $_GET['ma_khoa'] == $a->id ? 'selected' : ''; ?>><?= $a->ten_khoa; ?></option>
                        <?php endforeach; ?>

                    </select>

                </div>
                <div class="mt-2">
                    <input type="text" class="form-control" id="search_name" name="" placeholder="Nhập mã sinh viên của sinh viên muốn tìm ">
                </div>
            </div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Ảnh đại diện</th>
                        <th>Giới tính</th>
                        <th>Lớp</th>
                        <th><a href="<?= BASE_URL . '/sinh-vien/create'; ?>"><button class="btn btn-primary">Thêm sinh viên</button></a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ds_sv as $a) : ?>
                        <tr>
                            <td><?= 'PH'.$a->id; ?></td>
                            <td><?= $a->ho_dem . ' ' . $a->ten; ?></td>
                            <td><?= $a->ngay_sinh; ?></td>
                            <td><img src="<?= BASE_URL . '/storage/images/' . $a->anh_dai_dien; ?>" alt="" class="" style="width: 125px; height: 150px;border-radius: 0;"></td>
                            <td><?= $a->gioi_tinh == 1 ? 'Nữ' : 'Nam'; ?></td>
                            <td><?= $get_one_class($a->ma_lop)->ten_lop; ?></td>
                            <td>
                                <a href="<?= BASE_URL . '/sinh-vien/edit?id=' . $a->id; ?>"><button class="btn btn-info">Cập Nhật</button></a>
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
                                                    <p>Bạn có chắc muốn xóa sinh viên <?= $a->ho_dem . ' ' . $a->ten; ?></p>
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
                document.location = 'http://localhost/projects/quan_ly_sinh_vien/sinh-vien/delete?id=' + (+id);
            }, 1200);
        });
    });
    const select = document.getElementById('lop');
    select.addEventListener('change', () => {
        document.location = 'http://localhost/projects/quan_ly_sinh_vien/sinh-vien?ma_khoa=' + (+select.value);
    });

    document.getElementById('btn-reset').onclick = function() {
        document.location = 'http://localhost/projects/quan_ly_sinh_vien/sinh-vien';
    }
    const search = document.getElementById('search_name');
    search.onchange = function() {
        document.location = 'http://localhost/projects/quan_ly_sinh_vien/sinh-vien?ma_sv=' + search.value;
    }
</script>