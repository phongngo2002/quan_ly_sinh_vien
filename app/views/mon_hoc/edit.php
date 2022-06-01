<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật thông tin môn học</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" method="POST" action="<?= BASE_URL . '/mon-hoc/save_edit'; ?>">
                <div class="form-group">
                    <label for="ten_mon_hoc">Môn học</label>
                    <input type="hidden" value="<?= $model->id; ?>" name="id" id="id">
                    <input type="text" class="form-control" id="ten_mon_hoc" value="<?= $model->ten_mon_hoc ?>" name="ten_mon_hoc" placeholder="Tên môn học">
                </div>
                <div class="form-group">
                    <label for="mo_ta">Mô tả</label>
                    <textarea class="form-control" id="mo_ta" name="mo_ta" rows="2" placeholder="Mô tả môn học"><?= $model->mo_ta ?></textarea>
                </div>
                <button type="submit" class="btn btn-success mr-2">Cập nhật</button>
                <a href="<?= BASE_URL . '/mon-hoc'; ?>"> <button type="button" class="btn btn-light">Hủy</button></a>
            </form>
        </div>
    </div>
</div>