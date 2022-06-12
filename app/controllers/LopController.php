<?php

namespace App\Controllers;

use App\Models\Khoa;
use App\Models\Lop;
use App\Models\QuanTriVien;

class LopController
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
        $ds_lop = null;
        if (isset($_GET['nam_nhap_hoc']) &&  isset($_GET['khoa'])) {
            $ds_lop =
                Lop::where(['nam_nhap_hoc', '=', $_GET['nam_nhap_hoc']])
                ->andWhere(['ma_khoa', '=', $_GET['khoa']]);
        } else if (isset($_GET['nam_nhap_hoc']) && !isset($_GET['khoa'])) {
            $ds_lop =
                Lop::where(['nam_nhap_hoc', '=', $_GET['nam_nhap_hoc']]);
        } else if (!isset($_GET['nam_nhap_hoc']) && isset($_GET['khoa'])) {
            $ds_lop =
                Lop::where(['ma_khoa', '=', $_GET['khoa']]);
        } else {
            $ds_lop = Lop::where(['nam_nhap_hoc', '=', getdate()['year']]);
        }
        $ds_lop = $ds_lop->get();
        $ds_khoa = Khoa::all();
        $get_one_department = fn ($id) => Khoa::where(['id', '=', $id])->first();

        $VIEW_PAGE = './app/views/lop/list.php';

        include_once './app/views/layouts/main.php';
    }

    public function add_form()
    {
        $user = $this->user;
        $ds_khoa = Khoa::all();
        $VIEW_PAGE = './app/views/lop/add.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_create()
    {

        $ten_khoa = Khoa::where(['id', '=', $_REQUEST['ma_khoa']])->first()->ten_khoa;
        $strings = vn_to_str(explode(" ", $ten_khoa));
        $ma_lop = "";
        for ($i = 0; $i < count($strings); $i++) {
            $strings[$i] = substr(strtoupper($strings[$i]), 0, 1);
            if ($strings[$i] != '-') {
                $ma_lop .= $strings[$i];
            }
        }
        $model = new Lop();
        $model =  $model->insert([
            'ten_lop' => '',
            'he_dao_tao' => $_REQUEST['he_dao_tao'] == 0 ? 'Quốc Tế' : 'Thường',
            'nam_nhap_hoc' => $_REQUEST['nam_nhap_hoc'],
            'si_so' => $_REQUEST['si_so'],
            'ma_khoa' => $_REQUEST['ma_khoa']
        ]);
        $update_lop = Lop::where(['id', '=', $model->id])->first();
        $update_lop->update([
            'ten_lop' => $ma_lop . '' . $model->id
        ]);

        header('location: ' . BASE_URL . '/lop');
    }

    public function edit_form()
    {
        $user = $this->user;
        $ds_khoa = Khoa::all();
        $lop = Lop::where(['id', '=', $_GET['id']])->first();
        $VIEW_PAGE = './app/views/lop/edit.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_edit()
    {
        $lop = Lop::where(['id', '=', $_REQUEST['id']])->first();
        $lop->update(
            [
                'he_dao_tao' => $_REQUEST['he_dao_tao'] == 0 ? 'Quốc Tế' : 'Thường',
                'si_so' => $_REQUEST['si_so'],
                'ma_khoa' => $_REQUEST['ma_khoa']
            ]
        );

        header('location: ' . BASE_URL . '/lop');
    }

    public function remove()
    {
        $model = Lop::destroy($_GET['id']);
        header('location: ' . BASE_URL . '/lop');
    }
}
