<?php

namespace App\Controllers;

use App\Models\Menu_Model;
use App\Models\Model_Auth;

class Menu extends BaseController
{
    public function __construct()
    {
        $this->Menu_Model = new Menu_Model();
        $Menu_Model = new Menu_Model();
        $menu = $Menu_Model->findAll();
        helper('number');
        helper('form');
        helper('filesystem');
    }

    public function index()
    {

        $data = [
            'title' => 'Halaman Menu'

        ];
        return view('templates/menu', $data);
    }

    public function menu()
    {
        $menu = $this->Menu_Model->findALL();


        $data = [
            'title' => 'Halaman Menu',
            'menu' => $menu,
            'menu' => $this->Menu_Model->get_menu()


        ];
        return view('templates/menu', $data);
    }
    public function menu_new()
    {
        // session();
        $menu = $this->Menu_Model->findALL();


        $data = [
            'title' => 'Form Tambah Data Menu',
            'menu' => $menu,
            'menu' => $this->Menu_Model->get_menu(),
            'validation' => \Config\Services::validation()


        ];
        return view('templates/menu/tambah', $data);
    }


    public function menu_edit($id_menu)
    {
        $data = [
            'title' => 'Form Ubah Data Menu',
            'menu' => $this->Menu_Model->get_menu(),
            'validation' => \Config\Services::validation(),
            'menu' => $this->Menu_Model->menu_edit($id_menu),



        ];
        return view('templates/menu/edit', $data);
    }





    // fungsi CRUD

    public function menu_tambah()
    {
        if (!$this->validate([
            'nama_menu' => [
                'label' => 'Nama Makanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jenis' => [
                'label' => 'Nama Jenis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'status_masakan' => [
                'label' => 'Status Makanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,30024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Foto',
                    'mime_in' => 'Yang Anda Pilih Bukan Foto',
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/menu/menu_new')->withInput();
        }
        //ambil foto
        $filefoto = $this->request->getFile('foto');

        // jika tidak ada gambar yang diupload
        if ($filefoto->getError() == 4) {
            $namafoto = 'default.jpg';
        } else {
            // genarate nama foto
            $namafoto = $filefoto->getRandomName();

            // pindahkan foto ke folder foto
            $filefoto->move(ROOTPATH . 'public/foto/menu/', $namafoto);
        }

        //jika Valid
        $data = array(
            'nama_menu' => $this->request->getVar('nama_menu'),
            'jenis' => $this->request->getVar('jenis'),
            'harga' => $this->request->getVar('harga'),
            'status_masakan' => $this->request->getVar('status_masakan'),
            'foto' => $namafoto
        );
        $this->Menu_Model->menu_tambah($data);
        session()->setFlashdata('pesan', 'Tambah Data Berhasil');
        return redirect()->to(base_url('menu/menu'));
        // else {
        //     // jika tidak valid
        //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        //     return redirect()->to(base_url('menu/Menu_new'));
        // }
    }

    public function menu_update($id_menu)
    {
        if (!$this->validate([
            'nama_menu' => [
                'label' => 'Nama Makanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jenis' => [
                'label' => 'Nama Jenis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'status_masakan' => [
                'label' => 'Status Makanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,30024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Foto',
                    'mime_in' => 'Yang Anda Pilih Bukan Foto',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('menu/menu_edit/' . $this->request->getVar('id_menu'))->withInput();
        }
        $filefoto = $this->request->getFile('foto');
        // cek gambar, apakah tetap gambar lama
        if ($filefoto->getError() == 4) {
            $namafoto = $this->request->getVar('fotolama');
        } else {
            // generate nama file random
            $namafoto = $filefoto->getRandomName();
            // pindahkan gambar
            $filefoto->move('foto/menu/', $namafoto);
            //hapus file yang lama
            unlink('foto/menu/' . $this->request->getVar('fotolama'));
        }

        //jika Valid
        // $Menu_Model = new Menu_Model();
        $data = [
            'nama_menu' => $this->request->getVar('nama_menu'),
            'jenis' => $this->request->getVar('jenis'),
            'harga' => $this->request->getVar('harga'),
            'status_masakan' => $this->request->getVar('status_masakan'),
            'foto' => $namafoto
        ];
        // dd($data);
        $this->Menu_Model->menu_update($data, $id_menu);
        session()->setFlashdata('pesan', 'Ubah Data Berhasil');
        return redirect()->to(base_url('menu/menu'));
        // else {
        //     // jika tidak valid
        //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        //     return redirect()->to(base_url('menu/menu'));
        // }
    }

    public function menu_hapus($id_menu)
    {
        $menu = $this->Menu_Model->find($id_menu);
        // $menu = $this->Menu_Model->find($id_menu);
        if ($menu['foto'] != 'default.jpg') {
            // Hapus foto
            unlink('foto/menu/' . $menu['foto']);
        }

        $this->Menu_Model->where('id_menu', $id_menu)->delete();
        session()->setFlashdata('pesan', 'Hapus Data Berhasil');
        return redirect()->to(base_url('menu/menu'));
    }
}
