<?php

use App\Controllers\DashboardController;
use App\Controllers\KhoaController;
use App\Controllers\MonHocController;
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
    default:
        echo 'Đường dẫn bạn truy cập không tồn tại';
        break;
}
