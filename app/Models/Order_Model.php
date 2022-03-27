<?php

namespace App\Models;

use CodeIgniter\Model;

class Order_Model extends Model
{

    protected $table = 'order';
    protected $primaryKey = 'id_order';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['id_order', 'no_meja', 'tanggal', 'id_user', 'keterangan', 'status_order',];

    public function get_order()
    {
        return $this->db->table('order')
            ->join('user', 'user.id_user = order.id_user')->where('status_order', 'belum bayar')
            ->get()->getResultArray();
    }

    public function get_id_order()
    {
        $builder = $this->db->table('id_order');
        $query = $builder->countALL();
        return $query;
    }

    public function order_tambah($data)
    {
        $this->db->table('order')->insert($data);
    }
    public function order_update($data)
    {
        $this->db->table('order')->update($data);
    }
}
