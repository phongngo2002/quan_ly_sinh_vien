<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm mới lớp học</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" method="POST" action="<?= BASE_URL . '/lop/save-edit'; ?>">
                <div class="form-group">
                    <label for="exampleInputName1">Tên lớp</label>
                    <input type="hidden" value="<?= $lop->id; ?>" name="id" id="id">
                    <input type="text" class="form-control" disabled value="<?= $lop->ten_lop; ?>">
                </div>
                <div class="form-group">
                    <label for="he_dao_tao">Hệ đào tạo</label>
                    <div class="">
                        <select class="form-control" id="he_dao_tao" name="he_dao_tao">
                            <option value="0" <?= $lop->he_dao_tao == 'Quốc Tế' ? 'selected' : ''; ?>>Quốc tế</option>
                            <option value="1" <?= $lop->he_dao_tao == 'Thường' ? 'selected' : ''; ?>>Thường</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nam_nhap_hoc">Năm nhập học</label>
                    <input type="text" class="form-control" id="nam_nhap_hoc" name="nam_nhap_hoc" value="<?= $lop->nam_nhap_hoc; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="si_so">Sĩ số</label>
                    <input type="number" class="form-control" id="si_so" name="si_so" placeholder="Số lượng học sinh trong lớp học" value="<?= $lop->si_so; ?>">
                </div>
                <div class="form-group">
                    <label for="ma_khoa">Khoa</label>
                    <div class="">
                        <select class="form-control" id="ma_khoa" name="ma_khoa">
                            <?php foreach ($ds_khoa as $a) : ?>
                                <option value="<?= $a->id; ?>" <?= $a->id == $lop->ma_khoa ? 'selected' : ''; ?>><?= $a->ten_khoa; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mr-2">Lưu thay đổi</button>
                <a href="<?= BASE_URL . '/lop'; ?>"> <button type="button" class="btn btn-light">Hủy</button></a>
            </form>
        </div>
    </div>
</div>