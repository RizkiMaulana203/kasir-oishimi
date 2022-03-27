<?php

namespace App\Controllers;

use App\Models\Transaksi_Model;
use App\Models\User_Model;
use App\Models\Menu_Model;
use App\Models\Model_Auth;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->Transaksi_Model = new Transaksi_Model();
        $this->User_Model = new User_Model();
        $this->Menu_Model = new Menu_Model();
        $Transaksi_Model = new Transaksi_Model();
        $transaksi = $Transaksi_Model->findAll();
        helper('number');
        helper('form');
        helper('filesystem');
    }

    public function index()
    {

        $data = [
            'title' => 'Halaman Transaksi'

        ];
        return view('templates/transaksi', $data);
    }

    public function transaksi()
    {
        $Transaksi_Model = new Transaksi_Model();
        $transaksi = $this->Transaksi_Model->findALL();

        $data = [
            'title' => 'Halaman Transaksi',
            'transaksi' => $transaksi,
            'transaksi' => $this->Transaksi_Model->get_transaksi()


        ];
        return view('templates/transaksi/print', $data);
    }

    // public function Transaksi_new()
    // {
    //     // session();
    //     $transaksi = $this->Transaksi_Model->findALL();
    //     $user = $this->User_Model->findALL();
    //     $food = $this->Food_Model->findALL();
    //     $drink = $this->Drink_Model->findALL();


    //     $data = [
    //         'title' => 'Form Tambah Data Transaksi',
    //         'transaksi' => $transaksi,
    //         'user' => $user,
    //         'food' => $food,
    //         'drink' => $drink,
    //         'transaksi' => $transaksi,
    //         'transaksi' => $this->Transaksi_Model->get_transaksi(),
    //         'validation' => \Config\Services::validation()


    //     ];
    //     return view('templates/transaksi/tambah', $data);
    // }


    // public function Transaksi_edit($id_transaksi = null)
    // {
    //     $transaksi = $this->Transaksi_Model->findALL();
    //     $user = $this->User_Model->findALL();
    //     $food = $this->Food_Model->findALL();
    //     $drink = $this->Drink_Model->findALL();

    //     $data = [
    //         'title' => 'Form Ubah Data Transaksi',
    //         'user' => $user,
    //         'food' => $food,
    //         'drink' => $drink,
    //         'transaksi' => $transaksi,
    //         'transaksi' => $this->Transaksi_Model->get_transaksi(),
    //         'validation' => \Config\Services::validation(),
    //         'transaksi' => $this->Transaksi_Model->Transaksi_edit($id_transaksi),


    //     ];
    //     return view('templates/transaksi/edit', $data);
    // }





    // // fungsi CRUD

    // public function Transaksi_tambah()
    // {
    //     if (!$this->validate([
    //         'id_user' => [
    //             'label' => 'Nama',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'tanggal' => [
    //             'label' => 'Tanggal',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'total_bayar' => [
    //             'label' => 'Total Bayar',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'no_meja' => [
    //             'label' => 'No Meja',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'keterangan' => [
    //             'label' => 'Keterangan',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'status_order' => [
    //             'label' => 'Status Order',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'id_masakan' => [
    //             'label' => 'Foods',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'id_minuman' => [
    //             'label' => 'Drinks',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],


    //     ])) {
    //         $validation = \Config\Services::validation();
    //         return redirect()->to('/transaksi/Transaksi_new')->withInput();
    //     }
    //     //jika Valid
    //     $data = array(
    //         'id_user' => $this->request->getVar('id_user'),
    //         'tanggal' => $this->request->getVar('tanggal'),
    //         'total_bayar' => $this->request->getVar('total_bayar'),
    //         'no_meja' => $this->request->getVar('no_meja'),
    //         'keterangan' => $this->request->getVar('keterangan'),
    //         'status_order' => $this->request->getVar('status_order'),
    //         'id_masakan' => $this->request->getVar('id_masakan'),
    //         'id_minuman' => $this->request->getVar('id_minuman'),

    //     );
    //     $this->Transaksi_Model->Transaksi_tambah($data);
    //     session()->setFlashdata('pesan', 'Tambah Data Berhasil');
    //     return redirect()->to(base_url('transaksi/transaksi'));
    // }

    // public function Transaksi_update($id_transaksi)
    // {
    //     if (!$this->validate([
    //         'id_user' => [
    //             'label' => 'Nama',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'tanggal' => [
    //             'label' => 'Tanggal',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'total_bayar' => [
    //             'label' => 'Total Bayar',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'no_meja' => [
    //             'label' => 'No Meja',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'keterangan' => [
    //             'label' => 'Keterangan',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'status_order' => [
    //             'label' => 'Status Order',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'id_masakan' => [
    //             'label' => 'Foods',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //         'id_minuman' => [
    //             'label' => 'Drinks',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib Diisi !!!'
    //             ]
    //         ],
    //     ])) {
    //         $validation = \Config\Services::validation();
    //         return redirect()->to('transaksi/Transaksi_edit/' . $this->request->getVar('id_transaksi'))->withInput();
    //     }

    //     //jika Valid
    //     // $Transaksi_Model = new Transaksi_Model();
    //     $data = [
    //         'id_user' => $this->request->getVar('id_user'),
    //         'tanggal' => $this->request->getVar('tanggal'),
    //         'total_bayar' => $this->request->getVar('total_bayar'),
    //         'no_meja' => $this->request->getVar('no_meja'),
    //         'keterangan' => $this->request->getVar('keterangan'),
    //         'status_order' => $this->request->getVar('status_order'),
    //         'id_masakan' => $this->request->getVar('id_masakan'),
    //         'id_minuman' => $this->request->getVar('id_minuman'),

    //     ];
    //     // dd($data);
    //     $this->Transaksi_Model->Transaksi_update($data, $id_transaksi);
    //     session()->setFlashdata('pesan', 'Ubah Data Berhasil');
    //     return redirect()->to(base_url('transaksi/transaksi'));
    // }

    // public function Transaksi_hapus($id_transaksi)
    // {
    //     $transaksi = $this->Transaksi_Model->find($id_transaksi);

    //     $this->Transaksi_Model->where('id_transaksi', $id_transaksi)->delete();
    //     session()->setFlashdata('pesan', 'Hapus Data Berhasil');
    //     return redirect()->to(base_url('transaksi/transaksi'));
    // }

    // print
    public function print()
    {
        $Transaksi_Model = new Transaksi_Model();
        $transaksi = $this->Transaksi_Model->findALL();

        $data = [
            'title' => 'Halaman Transaksi',
            'transaksi' => $transaksi,
            'transaksi' => $this->Transaksi_Model->get_transaksi()


        ];
        return view('templates/transaksi/print', $data);
    }
}
