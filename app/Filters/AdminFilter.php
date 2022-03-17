<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('id_level') == "") {
            session()->setFlashdata('pesan', 'Anda Belum Login, Silahkan Login Terlebih Dahulu!! ');
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('id_level') == 1) {
            return redirect()->to(base_url('home'));
        }
    }
}
