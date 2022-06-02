<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý lớp học</h4>
            <p class="card-description">
            </p>
            <div class="table-responsive">
                <div>
                    <input type="text" class="form-control" id="filter_year" name="" placeholder="Nhập năm nhập học">
                </div>
                <div class="my-2">
                    <select class="form-control" id="khoa" name="khoa">
                        <option value="0">Lựa chọn khối nghành</option>
                        <?php foreach ($ds_khoa as $a) : ?>
                            <option value="<?= $a->id ?>"><?= $a->ten_khoa; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <button class="btn btn-warning" onclick="search()">Tìm kiếm</button>
                </div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Mã lớp</th>
                            <th>Tên lớp</th>
                            <th>Hệ đào tạo</th>
                            <th>Năm nhập học</th>
                            <th>Sĩ số</th>
                            <th>Khoa</th>
                            <th><a href=""><button class="btn btn-primary">Thêm mới lớp học</button></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ds_lop as $a) : ?>
                            <tr>
                                <td><?= $a->id; ?></td>
                                <td><?= $a->ten_lop; ?></td>
                                <td><?= $a->he_dao_tao; ?></td>
                                <td><?= $a->nam_nhap_hoc; ?></td>
                                <td><?= $a->si_so; ?></td>
                                <td><?= $get_one_department($a->ma_khoa)->ten_khoa; ?></td>
                                <td>
                                    <a href=""><button class="btn btn-info">Sửa</button></a>
                                    <a href=""><button class="btn btn-danger">Xóa</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    const nam_nhap_hoc = document.getElementById('filter_year');
    const khoa = document.getElementById('khoa');

    function search() {
        let parameter_path = '';
        if (nam_nhap_hoc.value && khoa.value != 0) {
            parameter_path = '?nam_nhap_hoc=' + nam_nhap_hoc.value + '&khoa=' + khoa.value;
        } else if (nam_nhap_hoc.value && khoa.value == 0) {
            parameter_path = '?nam_nhap_hoc=' + nam_nhap_hoc.value;
        } else if (!nam_nhap_hoc.value && khoa.value != 0) {
            parameter_path = '?khoa=' + khoa.value;
        } else {
            parameter_path = '';
        }
        document.location = 'http://localhost/projects/quan_ly_sinh_vien/lop' + parameter_path;
    }
</script>