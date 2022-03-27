<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{

    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['nama_user', 'username', 'password', 'id_level', 'foto'];

    public function get_user()
    {
        return $this->db->table('user')
            ->join('level', 'level.id_level = user.id_level')
            ->get()->getResultArray();
    }

    public function get_userLog()
    {
        return $this->db->table('user')
            ->join('level', 'level.id_level = user.id_level')
            ->join('log', 'log.id_user = user.id_user')
            ->get()->getResultArray();

        // $builder = $this->db->table('masyarakat');
        // $builder->select('*');
        // $builder->join('tb_masyarakat', 'tb_level.id_level = tb_masyarakat.id_level');
        // $query = $builder->get();
        // return $query->getResult();


    }

    public function get_id_user()
    {
        $builder = $this->db->table('id_user');
        $query = $builder->countALL();
        return $query;
    }
    public function user_tambah($data)
    {
        $this->db->table('user')->insert($data);
    }
    public function user_edit($id_user)
    {
        return $this->db->table('user')->where('id_user', $id_user)->get()->getRowArray();
    }
    public function user_update($data, $id_user)
    {
        return $this->db->table('user')->update($data, array('id_user' => $id_user));
    }
    public function profile($id_user)
    {
        return $this->db->table('user')->where('id_user', $id_user)->get()->getRowArray();
    }
    public function profile_update($data, $id_user)
    {
        return $this->db->table('user')->update($data, array('id_user' => $id_user));
    }
}
