<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm mới môn học</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" id="form-add" method="POST" action="<?= BASE_URL . '/mon-hoc/save_create'; ?>">
                <div class="form-group">
                    <label for="ten_mon_hoc">Môn học</label>
                    <input type="text" class="form-control" id="ten_mon_hoc" name="ten_mon_hoc" placeholder="Tên môn học">
                </div>
                <div class="form-group">
                    <label for="mo_ta">Mô tả</label>
                    <textarea class="form-control" id="mo_ta" name="mo_ta" rows="2" placeholder="Mô tả môn học"></textarea>
                </div>
                <button type="submit" class="btn btn-success mr-2">Tạo mới</button>
                <a href="<?= BASE_URL . '/mon-hoc'; ?>"> <button type="button" class="btn btn-light">Hủy</button></a>
            </form>
        </div>
    </div>
</div>
<script type="module">
    $("#form-add").validate({
        rules:{
            "ten_mon_hoc":{
                required: true
            },
            "mo_ta":{
                required: true
            }

        },
        messages:{
            "ten_mon_hoc":{
                required: 'Tên môn học bắt buộc nhập'
            },
            "mo_ta":{
                required: 'Mô tả bắt buộc nhập'
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>