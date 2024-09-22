<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    public function AllData()
    {
        return $this->db->table('tbl_user')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function DetailData($id)
    {
        return $this->db->table('tbl_user')
            ->where('id', $id)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_user')->where('id', $data['id'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_user')->where('id', $data['id'])->delete($data);
    }

    // Menghitung total user
    public function getTotalUser()
    {
        return $this->db->table('tbl_user')->countAll(); // Menghitung semua record dalam tabel
    }
}
