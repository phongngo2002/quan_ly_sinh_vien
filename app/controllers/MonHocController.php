<?php

namespace App\Controllers;

use App\Models\MonHoc;
use App\Models\QuanTriVien;

class MonHocController
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
        $ds_mon = MonHoc::all();
        $VIEW_PAGE = './app/views/mon_hoc/list.php';

        include_once './app/views/layouts/main.php';
    }

    public function add_form()
    {
        $user = $this->user;
        $VIEW_PAGE = './app/views/mon_hoc/add.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_create()
    {
        $model = new MonHoc();
        $model->insert(
            [
                'ten_mon_hoc' => $_REQUEST['ten_mon_hoc'],
                'mo_ta' => $_REQUEST['mo_ta']
            ]
        );

        header('location: ' . BASE_URL . '/mon-hoc');
    }

    public function edit_form()
    {
        $user = $this->user;
        $model = MonHoc::where(['id', '=', $_GET['id']])->first();
        $VIEW_PAGE = './app/views/mon_hoc/edit.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_edit()
    {
        $model = MonHoc::where(['id', '=', $_REQUEST['id']])->first();
        $model->update([
            'ten_mon_hoc' => $_REQUEST['ten_mon_hoc'],
            'mo_ta' => $_REQUEST['mo_ta']
        ]);

        header('location: ' . BASE_URL . '/mon-hoc');
    }

    public function remove()
    {
        $model = MonHoc::destroy($_GET['id']);
        header('location: ' . BASE_URL . '/mon-hoc');
    }
}
