<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm mới khoa</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" method="POST" action="<?= BASE_URL . '/khoa/save_create'; ?>">
                <div class="form-group">
                    <label for="exampleInputName1">Tên khoa</label>
                    <input type="text" class="form-control" id="ten_khoa" name="ten_khoa" placeholder="Tên khoa">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Số điện thoại</label>
                    <input type="text" class="form-control" id="dien_thoai" name="dien_thoai" placeholder="Số điện thoại liên hệ">
                </div>
                <button type="submit" class="btn btn-success mr-2">Tạo mới</button>
                <a href="<?= BASE_URL . '/khoa'; ?>"> <button type="button" class="btn btn-light">Hủy</button></a>
            </form>
        </div>
    </div>
</div>