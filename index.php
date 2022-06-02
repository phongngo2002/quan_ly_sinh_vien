<?php

use App\Controllers\DashboardController;
use App\Controllers\KhoaController;
use App\Controllers\LopController;
use App\Controllers\MonHocController;
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
    default:
        echo 'Đường dẫn bạn truy cập không tồn tại';
        break;
}
