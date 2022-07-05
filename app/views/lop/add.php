<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm mới lớp học</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" id="form-add" method="POST" action="<?= BASE_URL . '/lop/save-create'; ?>">
                <div class="form-group">
                    <label for="exampleInputName1">Tên lớp</label>
                    <input type="text" class="form-control" disabled value="Tự động">
                </div>
                <div class="form-group">
                    <label for="he_dao_tao">Hệ đào tạo</label>
                    <div class="">
                        <select class="form-control" id="he_dao_tao" name="he_dao_tao">
                            <option value="0">Quốc tế</option>
                            <option value="1">Thường</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nam_nhap_hoc">Năm nhập học</label>
                    <input type="text" class="form-control" id="nam_nhap_hoc" name="nam_nhap_hoc" value="<?= getdate()['year'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="si_so">Sĩ số</label>
                    <input type="number" class="form-control" id="si_so" name="si_so" placeholder="Số lượng học sinh trong lớp học">
                </div>
                <div class="form-group">
                    <label for="ma_khoa">Khoa</label>
                    <div class="">
                        <select class="form-control" id="ma_khoa" name="ma_khoa">
                            <?php foreach ($ds_khoa as $a) : ?>
                                <option value="<?= $a->id; ?>"><?= $a->ten_khoa; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mr-2">Tạo mới</button>
                <a href="<?= BASE_URL . '/lop'; ?>"> <button type="button" class="btn btn-light">Hủy</button></a>
            </form>
        </div>
    </div>
</div>

<script type="module">
    $("#form-add").validate({
        rules:{
            "si_so":{
                required: true,
                min:20
            }

        },
        messages:{
            "si_so":{
                required: 'Sĩ số bắt buộc nhập',
                min: 'Sĩ số bắt buộc lơn hơn 20'
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>