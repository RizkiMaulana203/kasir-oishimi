<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_Model extends Model
{
    public function total_user()
    {
        return $this->db->table('user')->countAll();
    }
    public function total_menu()
    {
        return $this->db->table('menu')->countAll();
    }
    public function total_transaksi()
    {
        return $this->db->table('transaksi')->countAll();
    }
}
