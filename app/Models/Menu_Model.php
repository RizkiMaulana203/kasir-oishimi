<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu_Model extends Model
{

    protected $table = 'menu';
    protected $primaryKey = 'id_menu';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['nama_menu', 'jenis', 'harga', 'status_masakan', 'foto'];

    public function get_menu()
    {
        return $this->db->table('menu')->get()->getResultArray();

        // $builder = $this->db->table('masyarakat');
        // $builder->select('*');
        // $builder->join('tb_masyarakat', 'tb_level.id_level = tb_masyarakat.id_level');
        // $query = $builder->get();
        // return $query->getResult();


    }

    public function get_id_menu()
    {
        $builder = $this->db->table('id_menu');
        $query = $builder->countALL();
        return $query;
    }
    public function menu_tambah($data)
    {
        $this->db->table('menu')->insert($data);
    }
    public function menu_edit($id_menu)
    {
        return $this->db->table('menu')->where('id_menu', $id_menu)->get()->getRowArray();
    }
    public function menu_update($data, $id_menu)
    {
        return $this->db->table('menu')->update($data, array('id_menu' => $id_menu));
    }
}
