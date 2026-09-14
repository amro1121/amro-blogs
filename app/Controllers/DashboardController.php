<?php
namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'user' => session()->get('userData')
        ];
        return view('dashboard/index', $data);
    }
}