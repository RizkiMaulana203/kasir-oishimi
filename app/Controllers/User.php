<?php

namespace App\Controllers;

use App\Models\User_Model;
use App\Models\Model_Auth;

class User extends BaseController
{
    public function __construct()
    {
        $this->User_Model = new User_Model();
        $User_Model = new User_Model();
        $User = $User_Model->findAll();
        helper('number');
        helper('form');
        helper('filesystem');
    }

    public function index()
    {

        $data = [
            'title' => 'Halaman Users'

        ];
        return view('templates/user', $data);
    }

    public function user()
    {
        $user = $this->User_Model->get_user();


        $data = [
            'title' => 'Halaman Users',
            'user' => $user,
            'user' => $this->User_Model->get_user()


        ];
        return view('templates/user', $data);
    }
    public function user_new()
    {
        // session();
        $user = $this->User_Model->findALL();


        $data = [
            'title' => 'Form Tambah Data Users',
            'user' => $user,
            'user' => $this->User_Model->get_user(),
            'validation' => \Config\Services::validation()


        ];
        return view('templates/user/tambah', $data);
    }


    public function user_edit($id_user)
    {

        $data = [
            'title' => 'Form Ubah Data Users',
            'user' => $this->User_Model->get_user(),
            'validation' => \Config\Services::validation(),
            'user' => $this->User_Model->user_edit($id_user),



        ];
        return view('templates/user/edit', $data);
    }


    public function profile()
    {
        $user = $this->User_Model->findALL();
        $data = [
            'title' => 'Profile',
            'user' => $this->User_Model->get_user(),

        ];
        return view('templates/user/profile', $data);
    }

    public function user_log()
    {
        $user = $this->User_Model->findALL();


        $data = [
            'title' => 'Halaman Log Users',
            'user' => $user,
            'user' => $this->User_Model->get_userLog()


        ];
        return view('templates/user_log', $data);
    }


    // fungsi CRUD

    public function user_tambah()
    {
        if (!$this->validate([
            'nama_user' => [
                'label' => 'Nama User',
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
            'Foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,10024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Foto',
                    'mime_in' => 'Yang Anda Pilih Bukan Foto',
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/user_new')->withInput();
        }
        //ambil foto
        $filefoto = $this->request->getFile('foto');

        // jika tidak ada gambar yang diupload
        if ($filefoto->getError() == 4) {
            $namafoto = 'default.png';
        } else {
            // genarate nama foto
            $namafoto = $filefoto->getRandomName();

            // pindahkan foto ke folder foto
            $filefoto->move(ROOTPATH . 'public/foto/user/', $namafoto);
        }

        //jika Valid
        $data = array(
            'nama_user' => $this->request->getVar('nama_user'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'id_level' => $this->request->getVar('id_level'),
            'foto' => $namafoto
        );
        $this->User_Model->user_tambah($data);
        session()->setFlashdata('pesan', 'Tambah Data Berhasil');
        return redirect()->to(base_url('user/user'));
        // else {
        //     // jika tidak valid
        //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        //     return redirect()->to(base_url('user/user_new'));
        // }
    }

    public function user_update($id_user)
    {
        if (!$this->validate([
            'nama_user' => [
                'label' => 'Nama',
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
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,10024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Foto',
                    'mime_in' => 'Yang Anda Pilih Bukan Foto',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('user/user_edit/' . $this->request->getVar('id_user'))->withInput();
        }
        $filefoto = $this->request->getFile('foto');
        // cek gambar, apakah tetap gambar lama
        if ($filefoto->getError() == 4) {
            $namafoto = $this->request->getVar('fotolama');
        } else {
            // generate nama file random
            $namafoto = $filefoto->getRandomName();
            // pindahkan gambar
            $filefoto->move('foto/user/', $namafoto);
            //hapus file yang lama
            unlink('foto/user/' . $this->request->getVar('fotolama'));
        }

        //jika Valid
        // $User_Model = new User_Model();
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'id_level' => $this->request->getPost('id_level'),
            'foto' => $namafoto
        ];
        // dd($data);
        $this->User_Model->user_update($data, $id_user);
        session()->setFlashdata('pesan', 'Ubah Data Berhasil');
        return redirect()->to(base_url('user/user'));
        // else {
        //     // jika tidak valid
        //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        //     return redirect()->to(base_url('user/user'));
        // }
    }

    public function user_hapus($id_user)
    {
        $user = $this->User_Model->find($id_user);
        // $user = $this->User_Model->find($id_user);
        if ($user['foto'] != 'default.png') {
            // Hapus foto
            unlink('foto/user/' . $user['foto']);
        }

        $this->User_Model->where('id_user', $id_user)->delete();
        session()->setFlashdata('pesan', 'Hapus Data Berhasil');
        return redirect()->to(base_url('user/user'));
    }
}
