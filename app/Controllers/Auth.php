<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\Model_Auth;
use CodeIgniter\HTTP\Request;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->Model_Auth = new Model_Auth();
        $db      = \Config\Database::connect();
    }

    public function index()
    {

        $data = [
            'title' => 'Login Page'

        ];
        return view('auth/login', $data);
    }

    public function register()
    {

        $data = [
            'title' => 'Register Page'

        ];
        return view('auth/register', $data);
    }

    public function login()
    {

        $data = [
            'title' => 'Login Page'

        ];
        return view('auth/login', $data);
    }

    public function save_register()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama user',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'repassword' => [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'matches' => '{field} Tidak Sama !!!'
                ]
            ],

        ])) {
            //jika Valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'id_level' => $this->request->getPost('id_level'),

            );
            $this->Model_Auth->save_register($data);
            session()->setFlashdata('pesan', 'Selamat Anda berhasil Registrasi, silakan login !!!');
            return redirect()->to(base_url('Auth/login'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
        }
    }

    public function cek_login()
    {
        $Model_Auth = new Model_Auth;
        $table = 'user';
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $Model_Auth->login($username, $table);

        // dd($cek);
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ]
        ])) {

            if ($cek == NULL) {
                session()->setFlashdata('pesan', 'username anda salah!!!');
                return redirect()->to('auth/login');
            }

            if (password_verify($password, $cek->password)) {
                $data = array(
                    'log' => TRUE,
                    'id_user' => $cek->id_user,
                    'nama_user' => $cek->nama_user,
                    'username' => $cek->username,
                    'id_level' => $cek->id_level,
                    'foto' => $cek->foto
                );
                // dd($data);
                session()->set($data);
                session()->setFlashdata('pesan', 'Berhasil login');
                return redirect()->to(base_url('home'));
            } else {
                // jika tidak valid

                session()->setFlashdata('pesan', 'Password anda salah');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('pesan', 'Anda Berhasil Logout');
        return redirect()->to('auth/login');
    }
}
