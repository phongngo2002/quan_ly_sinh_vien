<?php

namespace App\Controllers;

use App\Models\Khoa;
use App\Models\QuanTriVien;

class KhoaController
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
        $model = new Khoa();

        $ds_khoa = $model::all();

        $VIEW_PAGE = './app/views/khoa/list.php';

        include_once './app/views/layouts/main.php';
    }

    public function remove()
    {
        $id = $_GET['id'];
        $model = Khoa::destroy($id);

        header('location: ' . BASE_URL . '/khoa');
    }

    public function add_form()
    {
        $user = $this->user;
        $VIEW_PAGE = './app/views/khoa/add.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_create()
    {
        $model = new Khoa();
        $model->insert(
            [
                'ten_khoa' => $_REQUEST['ten_khoa'],
                'dien_thoai' => $_REQUEST['dien_thoai']
            ]
        );
        header('location: ' . BASE_URL . '/khoa');
    }

    public function edit_form()
    {
        $user = $this->user;
        $id = $_GET['id'];
        $khoa = Khoa::where(['id', '=', $id])->first();
        $VIEW_PAGE = './app/views/khoa/edit.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_edit()
    {
        $model = Khoa::where(['id', '=', $_REQUEST['id']])->first();
        $model->update(
            [
                'ten_khoa' => $_REQUEST['ten_khoa'],
                'dien_thoai' => $_REQUEST['dien_thoai']
            ]
        );

        header('location: ' . BASE_URL . '/khoa');
    }
}
