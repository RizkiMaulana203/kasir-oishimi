<?php

namespace App\Controllers;

use App\Models\Transaksi_Model;
use App\Models\Detail_Order_Model;
use App\Models\Order_Model;
use App\Models\User_Model;
use App\Models\Menu_Model;
use App\Models\Model_Auth;

class Order extends BaseController
{
    public function __construct()
    {
        $this->Detail_Order_Model = new Detail_Order_Model();
        $this->Order_Model = new Order_Model();
        $this->User_Model = new User_Model();
        $this->Menu_Model = new Menu_Model();
        $this->Transaksi_Model = new Transaksi_Model();

        $transaksi = $this->Transaksi_Model->findAll();
        helper('number');
        helper('form');
        helper('filesystem');
        session();
    }

    public function index()
    {
        $detail_order = $this->Detail_Order_Model->findALL();
        $detail_order = $this->Detail_Order_Model->get_detail_order();
        $menu = $this->Menu_Model->findALL();
        $order = $this->Order_Model->get_order();

        $data = [
            'title' => 'Halaman Order',
            'detail_order' => $detail_order,
            'menu' => $menu,
            'order' => $order,

        ];
        return view('templates/order', $data);
    }

    public function order()
    {
        $Order_Model = new Order_Model();
        $order = $this->Order_Model->findALL();
        $menu = $this->Menu_Model->findALL();
        $order = $this->Order_Model->get_order();
        $user = $this->User_Model->findALL();
        $user = $this->User_Model->get_user();

        $data = [
            'title' => 'Halaman Detail Order',
            'user' => $user,
            'menu' => $menu,
            'order' => $order,
            'order' => $this->Order_Model->get_order(),
            'detail_order' => $this->Detail_Order_Model,
            'user' => $this->User_Model->get_user()


        ];
        return view('templates/order/detail_order', $data);
    }
    public function order_new()
    {
        // session();
        $order = $this->Order_Model->findALL();
        $user = $this->User_Model->findALL();
        $order = $this->Order_Model->findALL();


        $data = [
            'title' => 'Form Detail Pemesanan',
            'order' => $order,
            'user' => $user,
            'order' => $this->Order_Model->get_order(),
            'validation' => \Config\Services::validation()


        ];
        return view('templates/order/tambah_order', $data);
    }

    public function detail_order_new()
    {
        // session();
        $order = new Order_Model();
        $detail_order = new Detail_Order_Model();
        $order = $this->Order_Model->findALL();
        $menu = $this->Menu_Model->findALL();
        $user = $this->User_Model->findALL();
        $detail_order = $this->Order_Model->findALL();
        $id_order = $this->Order_Model->findALL();



        $data = [
            'title' => 'Form Pemesanan',
            'order' => $order,
            'user' => $user,
            'detail_order' => $detail_order,
            'menu' => $menu,
            'id_order' => $id_order,
            'validation' => \Config\Services::validation()


        ];
        return view('templates/order/tambah_detail_order', $data);
    }

    public function detail_order_baru()
    {
        // session();
        $order = new Order_Model();
        $detail_order = new Detail_Order_Model();
        $order = $this->Order_Model->findALL();
        $menu = $this->Menu_Model->findALL();
        $user = $this->User_Model->findALL();
        $detail_order = $this->Order_Model->findALL();
        $id_order = $this->Order_Model->findALL();



        $data = [
            'title' => 'Form Tambah Pesanan',
            'order' => $order,
            'user' => $user,
            'detail_order' => $detail_order,
            'menu' => $menu,
            'id_order' => $id_order,
            'detail_order' => $this->Detail_Order_Model->get_detail_order(),
            'validation' => \Config\Services::validation()


        ];
        return view('templates/order/pesan_detail_order', $data);
    }

    public function detail_order_edit($id_detail_order = null)
    {
        $detail_order = $this->Detail_Order_Model->findALL();
        $user = $this->User_Model->findALL();
        $order = $this->Order_Model->findALL();
        $menu = $this->Menu_Model->findALL();

        $data = [
            'title' => 'Form Ubah Pesanan',
            'menu' => $menu,
            'order' => $order,
            'detail_order' => $detail_order,
            'detail_order' => $this->Detail_Order_Model->get_detail_order(),
            'validation' => \Config\Services::validation(),
            'detail_order' => $this->Detail_Order_Model->detail_order_edit($id_detail_order),


        ];
        return view('templates/order/detail_order_edit', $data);
    }


    public function order_bayar_new($id)
    {
        // session();
        $order = new Order_Model();
        $order = $this->Order_Model->findALL();
        $menu = $this->Menu_Model->get_menu();
        $user = $this->User_Model->findALL();
        $detail_order = $this->Detail_Order_Model->get_detail_order();
        $id_order = $this->Order_Model->findALL();
        $Transaksi_Model = new Transaksi_Model();

        foreach ($detail_order as $h) {
            $harga = $h['harga'];
            $jumlah = $h['jumlah'];
        }
        $total = $jumlah * $harga;

        // dd($total);
        $data = [
            'title' => 'Form Bayar Pesanan',
            'order' => $order,
            'user' => $user,
            'menu' => $menu,
            'id_order' => $id_order,
            'detail_order' => $this->Detail_Order_Model->get_detail_order1($id),
            'validation' => \Config\Services::validation(),
        ];
        return view('templates/order/order_bayar', $data);
    }

    public function transaksi()
    {
        $Transaksi_Model = new Transaksi_Model();
        $transaksi = $this->Transaksi_Model->get_transaksi();

        $data = [
            'title' => 'Halaman Transaksi',
            'transaksi' => $transaksi,
            'transaksi' => $this->Transaksi_Model->get_transaksi()


        ];
        return view('templates/transaksi', $data);
    }

    // print
    public function print()
    {
        $Transaksi_Model = new Transaksi_Model();
        $transaksi = $this->Transaksi_Model->findALL();

        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $transaksi,
            'transaksi' => $this->Transaksi_Model->get_transaksi()


        ];
        return view('templates/print', $data);
    }



    // fungsi CRUD

    public function tambah_detail_order()
    {
        if (!$this->validate([
            'id_menu' => [
                'label' => 'Menu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jumlah' => [
                'label' => 'Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/order/detail_order_new')->withInput();
        } else {
            $id_order = $this->Order_Model->where([
                'status_order' => 'belum bayar',
                'id_user' => session()->get('id_user')
            ])->first();
        }
        //jika Valid
        // dd(session()->get('id_user'));
        if (!isset($id_order)) {

            $id_user = session()->get('id_user');
            $data = [
                'tanggal' => date('Y-m-d'),
                'id_user' => $id_user,
                'status_order' => 'belum bayar'
            ];
            $this->Order_Model->save($data);
        }
        $id_order = $this->Order_Model->where([
            'status_order' => 'belum bayar',
            'id_user' => session()->get('id_user')
        ])->first();
        $id_order = $this->Order_Model->where('status_order', 'belum bayar')->first();

        $data = [
            'id_order' => $id_order['id_order'],
            'id_menu' => $this->request->getVar('id_menu'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status_detail_order' => 'proses'
        ];
        // dd($data);
        $this->Detail_Order_Model->detail_order_tambah($data);
        session()->setFlashdata('pesan', 'Tambah Data Berhasil');
        return redirect()->to(base_url('/order/order_new'));
    }

    public function pesan_detail_order()
    {
        if (!$this->validate([
            'id_menu' => [
                'label' => 'Menu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jumlah' => [
                'label' => 'Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/order/detail_order_baru')->withInput();
        } else {
            $id_order = $this->Order_Model->where([
                'status_order' => 'belum bayar',
                'id_user' => session()->get('id_user')
            ])->first();
        }
        //jika Valid
        // dd(session()->get('id_user'));
        if (!isset($id_order)) {

            $id_user = session()->get('id_user');
            $data = [
                'tanggal' => date('Y-m-d'),
                'id_user' => $id_user,
                'status_order' => 'belum bayar'
            ];
            $id_order = $this->Order_Model->where([
                'status_order' => 'belum bayar',
                'id_user' => session()->get('id_user')
            ])->first();
        }
        $id_order = $this->Order_Model->where('status_order', 'belum bayar')->first();
        $data = [
            'id_order' => $id_order['id_order'],
            'id_menu' => $this->request->getVar('id_menu'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status_detail_order' => 'proses'
        ];
        // dd($data);
        $this->Detail_Order_Model->detail_order_tambah($data);
        session()->setFlashdata('pesan', 'Tambah Data Berhasil');
        return redirect()->to(base_url('/order/order/detail_order'));
    }

    public function detail_order_update($id_detail_order)
    {
        if (!$this->validate([
            'id_menu' => [
                'label' => 'Menu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jumlah' => [
                'label' => 'Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/order/detail_order_baru' . $this->request->getVar('id_detail_order'))->withInput();
        } else {
            $id_order = $this->Order_Model->where([
                'status_order' => 'belum bayar',
                'id_user' => session()->get('id_user')
            ])->first();
        }
        //jika Valid
        // dd(session()->get('id_user'));
        if (!isset($id_order)) {

            $id_user = session()->get('id_user');
            $data = [
                'tanggal' => date('Y-m-d'),
                'id_user' => $id_user,
                'status_order' => 'belum bayar'
            ];
            $id_order = $this->Order_Model->where([
                'status_order' => 'belum bayar',
                'id_user' => session()->get('id_user')
            ])->first();
        }
        $id_order = $this->Order_Model->where('status_order', 'belum bayar')->first();
        $data = [
            'id_order' => $id_order['id_order'],
            'id_menu' => $this->request->getVar('id_menu'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status_detail_order' => 'proses'
        ];
        // dd($data);
        $this->Detail_Order_Model->detail_order_update($data, $id_detail_order);
        session()->setFlashdata('pesan', 'Ubah Data Berhasil');
        return redirect()->to(base_url('/order/order/detail_order'));
    }

    public function tambah_order()
    {
        if (!$this->validate([
            'no_meja' => [
                'label' => 'No Meja',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/order/order_new')->withInput();
        }
        //jika Valid

        $data = [
            'no_meja' => $this->request->getVar('no_meja'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->Order_Model->order_update($data);
        session()->setFlashdata('pesan', 'Tambah Data Berhasil');
        return redirect()->to(base_url('order/order/detail_order'));
    }


    public function order_bayar()
    {
        if (!$this->validate([

            'uang' => [
                'label' => 'Uang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/order/order_bayar_new')->withInput();
        }

        //jika Valid
        $id_order = $this->request->getVar('id_order');

        $total_bayar =  $this->request->getVar('total_bayar');
        $bayar =  $this->request->getVar('uang');

        $kembali = $bayar - $total_bayar;
        $data = [
            'id_user' => $this->request->getVar('id_user'),
            'id_order' => $id_order,
            'tanggal' => date("Y/m/d"),
            'total_bayar' => $total_bayar,
            'uang' => $bayar,
            'kembali' => $kembali,
        ];
        if ($total_bayar > $bayar) {
            session()->setFlashdata('error', 'Bayar gagal, uang kurang');
            return redirect()->back();
        }
        // dd($data);
        $insert =  $this->Transaksi_Model->save($data);
        // dd($cek);
        // dd($data);
        // dd($insert);
        if ($insert) {
            $status = [
                'id_order' => $id_order,
                'status_order' => 'sudah bayar',
            ];
            $tes = $this->Order_Model->save($status);

            session()->setFlashdata('pesan', 'Bayar Berhasil');
            return redirect()->to(base_url('order/transaksi'));
        }
    }





    public function detail_order_hapus($id_detail_order)
    {
        $detail_order = $this->Detail_Order_Model->find($id_detail_order);

        $this->Detail_Order_Model->where('id_detail_order', $id_detail_order)->delete();
        session()->setFlashdata('pesan', 'Hapus Data Berhasil');
        return redirect()->to(base_url('order/order/detail_order_hapus'));
    }

    public function order_hapus($id_order)
    {
        $order = $this->Order_Model->find($id_order);

        $this->Order_Model->where('id_order', $id_order)->delete();
        session()->setFlashdata('pesan', 'Hapus Data Berhasil');
        return redirect()->to(base_url('order/order/detail_order_hapus'));
    }

    public function detaildelet($id_order = null, $id_menu = null)
    {
        $order = $this->Order_Model->find($id_order);

        $this->Detail_Order_Model->where('id_detail_order', $id_order)->delete();
        $this->Detail_Order_Model->where('id_menu', $id_menu)->delete();
        session()->setFlashdata('pesan', 'Hapus Data Berhasil');
        return redirect()->to(base_url('order/order/detail_order_hapus'));
    }

    public function transaksi_hapus($id_transaksi)
    {
        $transaksi = $this->Order_Model->find($id_transaksi);

        $this->Transaksi_Model->where('id_transaksi', $id_transaksi)->delete();
        session()->setFlashdata('pesan', 'Hapus Data Berhasil');
        return redirect()->to(base_url('order/transaksi'));
    }
}
