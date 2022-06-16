<?php

namespace App\Controllers;

use App\Models\DiemThi;
use App\Models\QuanTriVien;
use App\Models\SinhVien;

class SiteController
{
    public function __construct()
    {
        if (isset($_SESSION['id-login-sv'])) {
            $this->user = SinhVien::where(['id', '=', $_SESSION['id-login-sv']])->first();
        } else {
            header('location: ' . BASE_URL . '/login');
        }
    }
    public function index()
    {
        $user = checkempty($this->user);
        $VIEW_PAGE = './app/views/client/layouts/page/home_page.php';
        include_once './app/views/client/layouts/main.php';
    }

    public function diemSV()
    {
        $user = checkempty($this->user);
        $diem_thi = DiemThi::rawQuery('SELECT ten_mon_hoc,diem_lan_1,diem_lan_2 FROM sinh_vien join diem_thi on sinh_vien.id = diem_thi.ma_sv join mon_hoc on diem_thi.ma_mon_hoc = mon_hoc.id WHERE sinh_vien.id = ' . $_SESSION['id-login-sv'] . '')->get();
        $VIEW_PAGE = './app/views/client/layouts/page/diem-sv.php';
        include_once './app/views/client/layouts/main.php';
    }
}
