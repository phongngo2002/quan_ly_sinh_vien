<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật thông tin sinh viên</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" method="POST" action="<?= BASE_URL . '/sinh-vien/save-edit'; ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="ho_dem">Họ đệm</label>
                        <input type="hidden" value="<?=$sv->id?>" name="id">
                        <input type="text" class="form-control" id="ho_dem" name="ho_dem" placeholder="Họ đệm" value="<?= $sv->ho_dem; ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="ten">Tên</label>
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="Tên" value="<?= $sv->ten; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ngay_sinh">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="<?= $sv->ngay_sinh; ?>">
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" name="anh_dai_dien" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <div class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Tải lên</button>
                        </div>
                    </div>
                    <div class="mt-2">
                        <img src="<?= BASE_URL . '/storage/images/' . $sv->anh_dai_dien; ?>" alt="" class="" style="width: 125px; height: 150px;border-radius: 0;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gioi_tinh">Giới tính</label>
                    <div class="">
                        <select class="form-control" id="gioi_tinh" name="gioi_tinh">
                            <option value="0" <?= $sv->gioi_tinh == 0 ? 'selected' : ''; ?>>Nam</option>
                            <option value="1" <?= $sv->gioi_tinh == 1 ? 'selected' : ''; ?>>Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ma_lop">Lớp</label>
                    <div class="">
                        <select class="form-control" id="ma_lop" name="ma_lop">
                            <?php foreach ($ds_lop as $a) : ?>
                                <option value="<?= $a->id; ?>" <?= $sv->ma_lop == $a->id ? 'selected' : ''; ?>><?= $a->ten_lop; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mr-2">Lưu</button>
                <button class="btn btn-light">Hủy</button>
            </form>
        </div>
    </div>
</div>