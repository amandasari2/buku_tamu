<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table = 'tbl_user'; // Ganti dengan nama tabel Anda
    protected $primaryKey = 'id';

    public function Login($email)
    {
        return $this->where('email', $email)->first();
    }
}
