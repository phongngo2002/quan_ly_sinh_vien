<?php

namespace App\Controllers;

use App\Models\QuanTriVien;

class QuanTriVienController
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
        $ds_quan_tri = QuanTriVien::all();
        $VIEW_PAGE = './app/views/quan_tri_vien/list.php';

        include_once './app/views/layouts/main.php';
    }

    public function add_form()
    {
        $user = $this->user;
        $so_tk = count(QuanTriVien::all());
        $VIEW_PAGE = './app/views/quan_tri_vien/add.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_create()
    {
        $model = new QuanTriVien();
        $model->insert(
            [
                'ho_dem' => $_REQUEST['ho_dem'],
                'ten' => $_REQUEST['ten'],
                'ten_tai_khoan' => $_REQUEST['ten_tai_khoan'],
                'mat_khau' => $_REQUEST['mat_khau']
            ]
        );

        header('location: ' . BASE_URL . '/quan-tri-vien');
    }

    public function edit_form()
    {
        $user = $this->user;
        $qtr_vien = QuanTriVien::where(['id', '=', $_GET['id']])->first();
        $VIEW_PAGE = './app/views/quan_tri_vien/edit.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_edit()
    {
        $model = QuanTriVien::where(['id', '=', $_REQUEST['id']])->first();
        $model->update(
            [
                'ho_dem' => $_REQUEST['ho_dem'],
                'ten' => $_REQUEST['ten'],
                'ten_tai_khoan' => $_REQUEST['ten_tai_khoan'],
                'mat_khau' => $_REQUEST['mat_khau']
            ]
        );

        header('location: ' . BASE_URL . '/quan-tri-vien');
    }
}
