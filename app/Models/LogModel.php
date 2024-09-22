<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'tbl_log'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key dari tabel

    // Kolom yang boleh diisi
    protected $allowedFields = ['idUser', 'ipAddress', 'device', 'status', 'terdaftar'];

    // Jika butuh menampilkan semua data log
    public function getAllLogs()
    {
        return $this->select('tbl_log.*, tbl_user.nama, tbl_user.level')
                    ->join('tbl_user', 'tbl_user.id = tbl_log.idUser', 'left') // Melakukan join dengan tabel user
                    ->orderBy('terdaftar', 'DESC') // Mengurutkan berdasarkan waktu terbaru
                    ->findAll();
    }
}
