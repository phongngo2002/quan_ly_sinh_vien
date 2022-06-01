<?php

namespace App\Controllers;

class DashboardController
{
    public function index()
    {
        $VIEW_PAGE = './app/views/dashboard/index.php';

        include_once './app/views/layouts/main.php';
    }
}
