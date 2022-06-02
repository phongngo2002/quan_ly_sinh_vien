<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật thông tin sinh viên</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" method="POST" action="<?= BASE_URL . '/sinh-vien/save-edit'; ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="gioi_tinh">Mã sinh viên</label>
                    <div class="">
                        <input type="text" class="form-control" id="ma_sv" value="<?= 'PH' . $sv->id; ?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="ho_dem">Họ đệm</label>
                        <input type="hidden" value="<?= $sv->id ?>" name="id">
                        <input type="text" class="form-control" id="ho_dem" name="ho_dem" placeholder="Họ đệm" value="<?= $sv->ho_dem; ?>" onchange="ten_dang_nhap()">
                    </div>
                    <div class="form-group col-6">
                        <label for="ten">Tên</label>
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="Tên" value="<?= $sv->ten; ?>" onchange="ten_dang_nhap()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="ho_dem">Tên tài khoản</label>
                        <input type="text" class="form-control" id="ten_tai_khoan" name="ten_tai_khoan" readonly value="<?= $sv->ten_dang_nhap; ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="ten">Mật khẩu</label>
                        <input type="password" class="form-control" id="mat_khau" name="mat_khau" value="<?= $sv->mat_khau; ?>" readonly>
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
<script>
    function removeVietnameseTones(str) {
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
        str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
        str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
        str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
        str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
        str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
        str = str.replace(/Đ/g, "D");
        // Some system encode vietnamese combining accent as individual utf-8 characters
        // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
        str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
        str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
        // Remove extra spaces
        // Bỏ các khoảng trắng liền nhau
        str = str.replace(/ + /g, " ");
        str = str.trim();
        // Remove punctuations
        // Bỏ dấu câu, kí tự đặc biệt
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
        return str;
    }

    function ten_dang_nhap() {
        const ho_dem = document.getElementById('ho_dem');
        const ten = document.getElementById('ten');
        const ten_tai_khoan = document.getElementById('ten_tai_khoan');
        const ma_sv = document.getElementById('ma_sv');
        let first = '';
        let last = '';
        const arr_ho_dem = ho_dem.value.split(" ");
        const arr_ten = ten.value.split(" ");
        for (let index = 0; index < arr_ho_dem.length; index++) {
            first += arr_ho_dem[index][0];
        }
        for (let index = 0; index < arr_ten.length; index++) {
            last += arr_ten[index];
        }
        console.log(first, last);
        let string = last + '' + first + 'ph' + ma_sv.value.slice(2,ma_sv.value.length);
        ten_tai_khoan.value = removeVietnameseTones(string.toLowerCase());
    }
</script>