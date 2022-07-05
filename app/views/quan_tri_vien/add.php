<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm mới tài khoản quản trị</h4>
            <p class="card-description">
            </p>
            <form class="forms-sample" method="POST" id="form-add" action="<?= BASE_URL . '/quan-tri-vien/save-create'; ?>">
                <div class="row p-0">
                    <input type="hidden" value="<?= $so_tk; ?>" id="so_tk">
                    <div class="form-group col-6">
                        <label for="ho_dem">Họ đệm</label>
                        <input type="text" class="form-control" id="ho_dem" name="ho_dem" placeholder="Họ đệm" onchange="get_ten_tk()">
                    </div>
                    <div class="form-group col-6">
                        <label for="ten">Tên</label>
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="Tên" onchange="get_ten_tk()">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ten_tai_khoan">Tên tài khoản</label>
                    <input type="text" class="form-control" id="ten_tai_khoan" name="ten_tai_khoan" placeholder="NULL" readonly>
                </div>
                <div class="form-group">
                    <label for="mat_khau">Mật khẩu</label>
                    <input type="text" class="form-control" id="mat_khau" name="mat_khau" value="123456" readonly>
                </div>
                <button type="submit" class="btn btn-success mr-2">Tạo mới</button>
                <a href="<?= BASE_URL . '/mon-hoc'; ?>"> <button type="button" class="btn btn-light">Hủy</button></a>
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

    function get_ten_tk() {
        const ho_dem = document.getElementById('ho_dem');
        const ten = document.getElementById('ten');
        const ten_tk = document.getElementById('ten_tai_khoan');
        const so_tk = Number(document.getElementById('so_tk').value);
        let first = '';
        let last = '';
        const arr_ho_dem = ho_dem.value.split(" ");
        const arr_ten = ten.value.split(" ");
        for (let index = 0; index < arr_ho_dem.length; index++) {
            last += arr_ho_dem[index][0];
        }
        for (let index = 0; index < arr_ten.length; index++) {
            first += arr_ten[index];
        }

        ten_tk.value = removeVietnameseTones((first + '' + last + '' + (so_tk + 1)).toLowerCase());
    }
</script>
<script type="module">
    $("#form-add").validate({
        rules:{
            "ho_dem":{
                required: true
            },
            "ten":{
                required:true
            }
        },
        messages:{
            "ho_dem":{
                required: 'Họ đệm bắt buộc nhập'
            },
            "ten":{
                required: 'Tên bắt buộc nhập'
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>