<?php

namespace App\Controllers;

use App\Models\Khoa;
use App\Models\Lop;
use App\Models\QuanTriVien;
use App\Models\SinhVien;

class SinhVienController
{
    public function __construct()
    {
        if (isset($_SESSION['id-login'])) {
            $this->user = QuanTriVien::where(['id', '=', $_SESSION['id-login']])->first();
        } else {
            header('location: ' . BASE_URL . '/login');
        }
    }
    public function index()
    {
        $user = $this->user;
        if (isset($_GET['ma_khoa'])) {
            $ma = $_GET['ma_khoa'];
            $ds_sv =
                SinhVien::rawQuery(
                    "select sinh_vien.id id,ma_sv,ma_lop,ho_dem,ten,ngay_sinh,anh_dai_dien,gioi_tinh from sinh_vien 
            join lop 
            on sinh_vien.ma_lop = lop.id
            join khoa
            on lop.ma_khoa = khoa.id
            where ma_khoa = '$ma'
            "
                )->get();
        } else if (isset($_GET['ma_sv'])) {
            $ma_sv = explode('ph', strtolower($_GET['ma_sv']));
            $ds_sv = SinhVien::where(['id', '=', $ma_sv[1]])->get();
        } else {
            $ds_sv = SinhVien::all();
        }
        $ds_khoa = Khoa::all();
        $get_one_class = fn ($id) => Lop::where(['id', '=', $id])->first();
        $VIEW_PAGE = './app/views/sinh_vien/list.php';

        include_once './app/views/layouts/main.php';
    }

    public function add_form()
    {
        $user = $this->user;
        $max_id = SinhVien::rawQuery('select max(id) max_id from sinh_vien')->first()->max_id;
        $ma_sv = get_ma_sv($max_id + 1);
        $ds_lop = Lop::all();
        $ma_sv_moi = SinhVien::rawQuery('select max(id) max_id from sinh_vien order by id desc')->first()->max_id;
        $VIEW_PAGE = './app/views/sinh_vien/add.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_create()
    {
        $img = $_FILES["anh_dai_dien"]["name"];
        $dir_path = $_SERVER["DOCUMENT_ROOT"] . '/projects/quan_ly_sinh_vien/storage/images/';
        if (strlen($img) > 0) {
            move_uploaded_file($_FILES["anh_dai_dien"]["tmp_name"], $dir_path . $_FILES['anh_dai_dien']['name']);
        } else {
            $img = 'avatar.jpg';
        }
        $model = new SinhVien();
        $model =  $model->insert(
            [
                'ho_dem' => $_REQUEST['ho_dem'],
                'ten' => $_REQUEST['ten'],
                'ngay_sinh' => $_REQUEST['ngay_sinh'],
                'gioi_tinh' => $_REQUEST['gioi_tinh'],
                'anh_dai_dien' => $img,
                'ma_lop' => $_REQUEST['ma_lop'],
                'ten_dang_nhap' => $_REQUEST['ten_tai_khoan'],
                'mat_khau' => $_REQUEST['mat_khau'],
                'ma_sv' => $_REQUEST['ma_sv']
            ]
        );
        $sv_moi = SinhVien::where(['id', '=', $model->id])
            ->first()
            ->update(
                [
                    'ma_sv' => 'PH' . get_ma_sv($model->id)
                ]
            );
        header('location: ' . BASE_URL . '/sinh-vien');
    }

    public function edit_form()
    {
        $user = $this->user;
        $ma_sv_moi = SinhVien::rawQuery('select max(id) max_id from sinh_vien order by id desc')->first()->max_id;
        $sv = SinhVien::where(['id', '=', $_GET['id']])->first();
        $ds_lop = Lop::all();
        $VIEW_PAGE = './app/views/sinh_vien/edit.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_edit()
    {

        $sv = SinhVien::where(['id', '=', $_REQUEST['id']])->first();
        $img = $_FILES["anh_dai_dien"]["name"];
        $dir_path = $_SERVER["DOCUMENT_ROOT"] . '/projects/quan_ly_sinh_vien/storage/images/';
        if (strlen($img) > 0) {
            move_uploaded_file($_FILES["anh_dai_dien"]["tmp_name"], $dir_path . $_FILES['anh_dai_dien']['name']);
        } else {
            $img = $sv->anh_dai_dien;
        }
        $sv->update(
            [
                'ho_dem' => $_REQUEST['ho_dem'],
                'ten' => $_REQUEST['ten'],
                'ngay_sinh' => $_REQUEST['ngay_sinh'],
                'gioi_tinh' => $_REQUEST['gioi_tinh'],
                'anh_dai_dien' => $img,
                'ma_lop' => $_REQUEST['ma_lop'],
                'ten_dang_nhap' => $_REQUEST['ten_tai_khoan'],
                'mat_khau' => $_REQUEST['mat_khau']
            ]
        );
        header('location: ' . BASE_URL . '/sinh-vien');
    }

    public function remove()
    {
        $model = SinhVien::destroy($_GET['id']);
        header('location: ' . BASE_URL . '/sinh-vien');
    }
}
