<?php

namespace App\Controllers;

use App\Models\Lop;
use App\Models\SinhVien;

class SinhVienController
{
    public function index()
    {
        $ds_sv =
            isset($_GET['ma_lop'])
            ?
            SinhVien::where(['ma_lop', '=', $_GET['ma_lop']])->get()
            :
            SinhVien::all();
        $ds_lop = Lop::all();
        $get_one_class = fn ($id) => Lop::where(['id', '=', $id])->first();
        $VIEW_PAGE = './app/views/sinh_vien/list.php';

        include_once './app/views/layouts/main.php';
    }

    public function add_form()
    {
        $ds_lop = Lop::all();
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
        $model->insert(
            [
                'ho_dem' => $_REQUEST['ho_dem'],
                'ten' => $_REQUEST['ten'],
                'ngay_sinh' => $_REQUEST['ngay_sinh'],
                'gioi_tinh' => $_REQUEST['gioi_tinh'],
                'anh_dai_dien' => $img,
                'ma_lop' => $_REQUEST['ma_lop']
            ]
        );
        header('location: ' . BASE_URL . '/sinh-vien');
    }

    public function edit_form()
    {
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
                'ma_lop' => $_REQUEST['ma_lop']
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
