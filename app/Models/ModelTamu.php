<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTamu extends Model
{
    protected $table = 'tbl_tamu';
    public function AllData()
    {
        return $this->db->table('tbl_tamu')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_tamu')->insert($data);
    }

    public function DetailData($id)
    {
        return $this->db->table('tbl_tamu')
            ->where('id', $id)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_tamu')->where('id', $data['id'])->update($data);
    }

    public function DeleteData($id)
    {
        $this->db->table('tbl_tamu')->where('id', $id)->delete();
    }

    // Menghitung total tamu
    public function getTotalTamu()
    {
        return $this->db->table($this->table)->countAll();
    }

    // Menghitung total tamu laki-laki
    public function getTotalLakiLaki()
    {
        return $this->db->table($this->table)->where('jenis_kelamin', 'Laki - Laki')->countAllResults();
    }

    // Menghitung total tamu perempuan
    public function getTotalPerempuan()
    {
        return $this->db->table($this->table)->where('jenis_kelamin', 'Perempuan')->countAllResults();
    }

    public function getTamuPerBulan($tahun)
    {
        // Mengambil jumlah tamu per bulan dalam tahun tertentu
        $data = $this->select('MONTH(terdaftar) as bulan, COUNT(*) as jumlah')
                     ->where('YEAR(terdaftar)', $tahun)
                     ->groupBy('MONTH(terdaftar)')
                     ->get()
                     ->getResultArray();

        return $data;
    }

}
