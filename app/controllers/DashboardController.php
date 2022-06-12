<?php

namespace App\Controllers;

use App\Models\QuanTriVien;

class DashboardController
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
        $VIEW_PAGE = './app/views/dashboard/index.php';

        include_once './app/views/layouts/main.php';
    }
}
