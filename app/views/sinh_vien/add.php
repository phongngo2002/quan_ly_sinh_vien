<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm mới sinh viên</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" method="POST" action="<?= BASE_URL . '/sinh-vien/save-create'; ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="ho_dem">Họ đệm</label>
                        <input type="text" class="form-control" id="ho_dem" name="ho_dem" placeholder="Họ đệm">
                    </div>
                    <div class="form-group col-6">
                        <label for="ten">Tên</label>
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="Tên">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ngay_sinh">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
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
                </div>
                <div class="form-group">
                    <label for="gioi_tinh">Giới tính</label>
                    <div class="">
                        <select class="form-control" id="gioi_tinh" name="gioi_tinh">
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ma_lop">Lớp</label>
                    <div class="">
                        <select class="form-control" id="ma_lop" name="ma_lop">
                            <?php foreach ($ds_lop as $a) : ?>
                                <option value="<?= $a->id; ?>"><?= $a->ten_lop; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mr-2">Tạo mới</button>
                <button class="btn btn-light">Hủy</button>
            </form>
        </div>
    </div>
</div>