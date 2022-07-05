<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sửa điểm</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" method="POST" id="form-edit" action="<?= BASE_URL . '/danh-sach-diem/save_edit'; ?>">
                <div class="form-group">
                    <label for="ma_sv">Mã sinh viên</label>
                    <input type="text" class="form-control" id="ma_sv" name="ma_sv" value="<?= $ct_diem->ma_sv ?>">
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="diem_lan_1">Điểm lần 1</label>
                        <input type="number" class="form-control" id="diem_lan_1" name="diem_lan_1" value="<?=$ct_diem->diem_lan_1?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="diem_lan_2">Điểm lần 2</label>
                        <input type="number" class="form-control" id="diem_lan_2" name="diem_lan_2" value="<?=$ct_diem->diem_lan_2?>">
                    </div>
                </div>
                <input type="hidden" value="<?= $mon_hoc->id; ?>" name="ma_mon_hoc">
                <div class="form-group">
                    <label for="mon_hoc">Môn học</label>
                    <input type="text" class="form-control" id="mon_hoc" name="mon_hoc" disabled value="<?= $mon_hoc->ten_mon_hoc; ?>">
                </div>
                <button type="submit" class="btn btn-success mr-2">Lưu</button>
                <a href="<?= BASE_URL . '/danh-sach-diem/chi-tiet?ma_mon_hoc=' . $mon_hoc->id; ?>"> <button type="button" class="btn btn-light">Hủy</button></a>            </form>
        </div>
    </div>
</div>
<script type="module">
    $("#form-edit").validate({
        rules:{
            "ma_sv":{
                required: true,
                minlength:7,
                maxlength:7
            }
        },
        messages:{
            "ma_sv":{
                required: 'Mã sinh viên bắt buộc nhập',
                minlength: 'Mã sinh viên không hợp lệ',
                maxlength: 'Mã sinh viên không hợp lệ'

            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>