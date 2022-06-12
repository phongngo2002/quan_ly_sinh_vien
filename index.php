<?php

use App\Controllers\DashboardController;
use App\Controllers\DiemThiController;
use App\Controllers\KhoaController;
use App\Controllers\LoginController;
use App\Controllers\LopController;
use App\Controllers\MonHocController;
use App\Controllers\QuanTriVienController;
use App\Controllers\SinhVienController;

session_start();
require_once './commons/helpers.php';
require_once './vendor/autoload.php';


$url = isset($_GET['url']) ? $_GET['url'] : "/";

switch ($url) {
    case '/':
        $act = new DashboardController();
        $act->index();
        break;
    case 'login':
        $act = new LoginController();
        $act->index();
        break;
    case 'save-login':
        $act = new LoginController();
        $act->save_login();
        break;
    case 'logout':
        $act = new LoginController();
        $act->logout();
        break;
    case 'khoa':
        $act = new KhoaController();
        $act->index();
        break;
    case 'khoa/delete':
        $act = new KhoaController();
        $act->remove();
        break;
    case 'khoa/create':
        $act = new KhoaController();
        $act->add_form();
        break;
    case 'khoa/save_create':
        $act = new KhoaController();
        $act->save_create();
        break;
    case 'khoa/edit':
        $act = new KhoaController();
        $act->edit_form();
        break;
    case 'khoa/save_edit':
        $act = new KhoaController();
        $act->save_edit();
        break;
    case 'mon-hoc':
        $act = new MonHocController();
        $act->index();
        break;
    case 'mon-hoc/create':
        $act = new MonHocController();
        $act->add_form();
        break;
    case 'mon-hoc/save_create':
        $act = new MonHocController();
        $act->save_create();
        break;
    case 'mon-hoc/edit':
        $act = new MonHocController();
        $act->edit_form();
        break;
    case 'mon-hoc/save_edit':
        $act = new MonHocController();
        $act->save_edit();
        break;
    case 'mon-hoc/delete':
        $act = new MonHocController();
        $act->remove();
        break;
    case 'sinh-vien':
        $act = new SinhVienController();
        $act->index();
        break;
    case 'sinh-vien/create':
        $act = new SinhVienController();
        $act->add_form();
        break;
    case 'sinh-vien/save-create':
        $act = new SinhVienController();
        $act->save_create();
        break;
    case 'sinh-vien/edit':
        $act = new SinhVienController();
        $act->edit_form();
        break;
    case 'sinh-vien/save-edit':
        $act = new SinhVienController();
        $act->save_edit();
        break;
    case 'sinh-vien/delete':
        $act = new SinhVienController();
        $act->remove();
        break;
    case 'lop':
        $act = new LopController();
        $act->index();
        break;
    case 'lop/create':
        $act = new LopController();
        $act->add_form();
        break;
    case 'lop/save-create':
        $act = new LopController();
        $act->save_create();
        break;
    case 'lop/edit':
        $act = new LopController();
        $act->edit_form();
        break;
    case 'lop/save-edit':
        $act = new LopController();
        $act->save_edit();
        break;
    case 'lop/delete':
        $act = new LopController();
        $act->remove();
        break;
    case 'danh-sach-diem':
        $act = new DiemThiController();
        $act->index();
        break;
    case 'danh-sach-diem/chi-tiet':
        $act = new DiemThiController();
        $act->detail();
        break;
    case 'danh-sach-diem/nhap-diem':
        $act = new DiemThiController();
        $act->form_nhap();
        break;
    case 'danh-sach-diem/save_create':
        $act = new DiemThiController();
        $act->save_create();
        break;
    case 'danh-sach-diem/sua-diem':
        $act = new DiemThiController();
        $act->edit_form();
        break;
    case 'danh-sach-diem/save_edit':
        $act = new DiemThiController();
        $act->save_edit();
        break;
    case 'quan-tri-vien':
        $act = new QuanTriVienController();
        $act->index();
        break;
    case 'quan-tri-vien/create':
        $act = new QuanTriVienController();
        $act->add_form();
        break;
    case 'quan-tri-vien/save-create':
        $act = new QuanTriVienController();
        $act->save_create();
        break;
    case 'quan-tri-vien/edit':
        $act = new QuanTriVienController();
        $act->edit_form();
        break;
    case 'quan-tri-vien/save-edit':
        $act = new QuanTriVienController();
        $act->save_edit();
        break;
    default:
        echo 'Đường dẫn bạn truy cập không tồn tại';
        break;
}
