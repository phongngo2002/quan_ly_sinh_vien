<?php

namespace App\Controllers;

use App\Models\DiemThi;
use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\QuanTriVien;
use App\Models\SinhVien;

class DiemThiController
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
        $ds_diem =
            DiemThi::rawQuery(' SELECT ma_mon_hoc,ten_mon_hoc,COUNT(ma_sv) tong_sv,AVG((diem_lan_1 + diem_lan_2) / 2) dtb ,(select COUNT(ma_sv) FROM diem_thi WHERE (diem_lan_1 + diem_lan_2) / 2 >= 5)/COUNT(ma_sv) ty_le_dat FROM diem_thi JOIN mon_hoc on diem_thi.ma_mon_hoc = mon_hoc.id GROUP BY ten_mon_hoc')->get();
        $i = 1;
        $ds_khoa = Khoa::all();
        $VIEW_PAGE = './app/views/bang_diem/list.php';

        include_once './app/views/layouts/main.php';
    }

    public function detail()
    {
        $user = $this->user;
        $i = 1;
        $ct_diem = DiemThi::rawQuery('SELECT ho_dem,sinh_vien.id id_sv,ten,sinh_vien.ma_sv ma_sv,diem_lan_1,diem_lan_2,(diem_lan_1 + diem_lan_2 )/2 dtb,ten_lop FROM diem_thi JOIN sinh_vien  on diem_thi.ma_sv = sinh_vien.id JOIN lop on sinh_vien.ma_lop = lop.id where ma_mon_hoc = ' . $_GET['ma_mon_hoc'] . '
        and nam_nhap_hoc = ' . getdate()['year'] . '')->get();

        $mon_hoc = MonHoc::where(['id', '=', $_GET['ma_mon_hoc']])->first();
        $VIEW_PAGE = './app/views/bang_diem/detail.php';

        include_once './app/views/layouts/main.php';
    }

    public function form_nhap()
    {
        $user = $this->user;
        $mon_hoc = MonHoc::where(['id', '=', $_GET['ma_mon_hoc']])->first();
        $VIEW_PAGE = './app/views/bang_diem/form_nhap_diem.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_create()
    {
        $model = new DiemThi();
        $id_sv = SinhVien::where(['ma_sv', '=', $_REQUEST['ma_sv']])->first()->id;
        $model = $model->insert(
            [
                'ma_mon_hoc' => $_REQUEST['ma_mon_hoc'],
                'ma_sv' => $id_sv,
                'diem_lan_1' => $_REQUEST['diem_lan_1'],
                'diem_lan_2' => $_REQUEST['diem_lan_2']
            ]
        );

        header('location: ' . BASE_URL . '/danh-sach-diem/chi-tiet?ma_mon_hoc=' . $_REQUEST['ma_mon_hoc']);
    }

    public function edit_form()
    {
        $user = $this->user;
        $mon_hoc = MonHoc::where(['id', '=', $_GET['ma_mon_hoc']])->first();
        $ct_diem = DiemThi::rawQuery('SELECT sinh_vien.ma_sv ma_sv,diem_lan_1,diem_lan_2 FROM diem_thi join sinh_vien on diem_thi.ma_sv = sinh_vien.id where sinh_vien.id = ' . $_GET['id'] . ' and ma_mon_hoc = ' . $_GET['ma_mon_hoc'] . '')->first();

        $VIEW_PAGE = './app/views/bang_diem/form_sua_diem.php';

        include_once './app/views/layouts/main.php';
    }

    public function save_edit()
    {

        $id_sv = SinhVien::where(['ma_sv', '=', $_REQUEST['ma_sv']])->first()->id;
        $model = DiemThi::where(['ma_sv', '=', $id_sv])->andWhere(['ma_mon_hoc', '=', $_REQUEST['ma_mon_hoc']])->first();
        $model->update(
            [
                'ma_sv' => $id_sv,
                'diem_lan_1' => $_REQUEST['diem_lan_1'],
                'diem_lan_2' => $_REQUEST['diem_lan_2']
            ]
        );

        header('location: ' . BASE_URL . '/danh-sach-diem/chi-tiet?ma_mon_hoc=' . $_REQUEST['ma_mon_hoc']);
    }
}
