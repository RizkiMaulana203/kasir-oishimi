<?php

namespace App\Controllers;

use App\Models\Home_Model;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Home_Model = new Home_Model();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'total_user' => $this->Home_Model->total_user(),
            'total_menu' => $this->Home_Model->total_menu(),
            'total_transaksi' => $this->Home_Model->total_transaksi(),

        ];
        return view('templates/home', $data);
    }
}
