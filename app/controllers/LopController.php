<?php

namespace App\Controllers;

use App\Models\Khoa;
use App\Models\Lop;

class LopController
{
    public function index()
    {
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
}
