<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật thông tin khoa</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" method="POST" id="form-edit" action="<?= BASE_URL . '/khoa/save_edit'; ?>">
                <div class="form-group">
                    <label for="exampleInputName1">Tên khoa</label>
                    <input type="hidden" value="<?= $khoa->id; ?>" name="id" id="id">
                    <input type="text" class="form-control" id="ten_khoa" value="<?= $khoa->ten_khoa; ?>" name="ten_khoa" placeholder="Tên khoa">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Số điện thoại</label>
                    <input type="text" class="form-control" id="dien_thoai" value="<?= $khoa->dien_thoai; ?>" name="dien_thoai" placeholder="Số điện thoại liên hệ">
                </div>
                <button type="submit" class="btn btn-success mr-2">Cập nhật</button>
                <a href="<?= BASE_URL . '/khoa'; ?>"> <button type="button" class="btn btn-light">Hủy</button></a>
            </form>
        </div>
    </div>
</div>
<script type="module">
    $("#form-edit").validate({
        rules:{
            "ten_khoa":{
                required: true
            },
            "dien_thoai":{
                required:true
            }
        },
        messages:{
            "ten_khoa":{
                required: 'Tên khoa bắt buộc nhập'
            },
            "dien_thoai":{
                required: 'Số điện thoại của khoa bắt buộc nhập'
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>