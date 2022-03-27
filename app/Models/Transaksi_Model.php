<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_Model extends Model
{

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['id_user', 'id_order', 'tanggal', 'total_bayar', 'uang', 'kembali'];

    public function get_transaksi()
    {
        return $this->db->table('transaksi')
            ->join('user', 'user.id_user = transaksi.id_user')
            ->join('order', 'order.id_order = transaksi.id_order')
            ->get()->getResultArray();
    }

    public function get_id_transaksi()
    {
        $builder = $this->db->table('id_transaksi');
        $query = $builder->countALL();
        return $query;
    }

    public function transaksi_tambah($data)
    {
        $this->db->table('transaksi')->insert($data);
    }
    public function transaksi_edit($id_transaksi)
    {
        return $this->db->table('transaksi')->where('id_transaksi', $id_transaksi)->get()->getRowArray();
    }
    public function transaksi_update($data, $id_transaksi)
    {
        return $this->db->table('transaksi')->update($data, array('id_transaksi' => $id_transaksi));
    }
}
