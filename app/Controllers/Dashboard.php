<?php

namespace App\Controllers;

use App\Models\ModelTamu;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $ModelTamu;
    protected $UserModel;
    public function __construct()
    {
        // Inisialisasi model
        $this->UserModel = new UserModel();
        $this->ModelTamu = new ModelTamu();
        
    }
    public function index(): string
    {
        $tahun = date('Y'); // Misalkan tahun saat ini
        $tamuPerBulan = $this->ModelTamu->getTamuPerBulan($tahun);

        // Mempersiapkan array bulan dan jumlah tamu
        $bulan = array_fill(1, 12, 0); // Mengisi array dari Januari-Desember dengan nilai 0
        foreach ($tamuPerBulan as $data) {
            $bulan[$data['bulan']] = $data['jumlah'];
        }

        $data = [
            'judul' => 'Dashboard',
            'page' => 'v_dashboard',
            'menu' => 'dashboard',
            'totalUser' => $this->UserModel->getTotalUser(),
            'totalTamu' => $this->ModelTamu->getTotalTamu(),
            'totalLakiLaki' => $this->ModelTamu->getTotalLakiLaki(),
            'totalPerempuan' => $this->ModelTamu->getTotalPerempuan(),
            'tamuPerBulan' => json_encode(array_values($bulan)),
        ];
        return view('v_template', $data);
    }
}
