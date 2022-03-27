<?php

namespace App\Models;

use CodeIgniter\Model;

class Detail_Order_Model extends Model
{

    protected $table = 'detail_order';
    protected $primaryKey = 'id_detail_order';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['id_order', 'id_menu', 'keterangan', 'jumlah', 'status_detail_order',];

    public function get_detail_order()
    {
        return $this->db->table('detail_order')
            ->join('menu', 'menu.id_menu = detail_order.id_menu')
            ->get()->getResultArray();
    }
    public function get_detail_order1($id)
    {
        return $this->db->table('detail_order')
            ->join('menu', 'menu.id_menu = detail_order.id_menu')
            ->where('id_order', $id)
            ->get()->getResultArray();
    }

    public function get_id_detail_order()
    {
        $builder = $this->db->table('id_detail_order');
        $query = $builder->countALL();
        return $query;
    }

    public function detail_order_tambah($data)
    {
        $this->db->table('detail_order')->insert($data);
    }

    public function detail_order_edit($id_detail_order)
    {
        return $this->db->table('detail_order')->where('id_detail_order', $id_detail_order)->get()->getRowArray();
    }

    public function detail_order_update($data, $id_detail_order)
    {
        return $this->db->table('detail_order')->update($data, array('id_detail_order' => $id_detail_order));
    }
}
