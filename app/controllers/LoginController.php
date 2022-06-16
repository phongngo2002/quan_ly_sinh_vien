<?php

namespace App\Controllers;

use App\Models\QuanTriVien;
use App\Models\SinhVien;

class LoginController
{
    public function index()
    {
        include_once './app/views/login/layout.php';
    }

    public function save_login()
    {
        $model = QuanTriVien::where(['ten_tai_khoan', '=', $_REQUEST['ten_tai_khoan']])
            ->andWhere(['mat_khau', '=', $_REQUEST['mat_khau']])
            ->first();
        if ($model) {
            $_SESSION['id-login'] = $model->id;
            header('location: ' . BASE_URL . '/dashboard');
        } else {
            $model2 = SinhVien::where(['ten_dang_nhap', '=', $_REQUEST['ten_tai_khoan']])->andWhere(['mat_khau', '=', $_REQUEST['mat_khau']])->first();
            if ($model2) {
                $_SESSION['id-login-sv'] = $model2->id;
                header('location: ' . BASE_URL);
            } else {
                header('location: ' . BASE_URL . '/login?loi-dang-nhap');
            }
        }
    }

    public function logout()
    {
        if (isset($_GET['sv'])) {
            unset($_SESSION['id-login-sv']);
            header('location: ' . BASE_URL);
        } else {
            unset($_SESSION['id-login']);
            header('location: ' . BASE_URL . '/login');
        }
    }
}
