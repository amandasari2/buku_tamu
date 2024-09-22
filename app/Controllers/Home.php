<?php

namespace App\Controllers;
use App\Models\ModelTamu;

class Home extends BaseController
{
    protected $ModelTamu;
    public function __construct()
    {
        $this->ModelTamu = new ModelTamu();
    }
    public function index(): string
    {

        $data = [
            'judul' => 'Formulir Buku Tamu',
            'page' => 'beranda',
            'menu' => 'home',
            'tamu' => $this->ModelTamu->AllData(),
        ];
        return view('beranda', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama' => [
                'label' => 'Nama Tamu',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi!']
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi!']
            ],
            'instansi' => [
                'label' => 'Instansi/Perusahaan',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi!']
            ],
            'no_telp' => [
                'label' => 'Nomor Telepon',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi!']
            ],
            'alamat' => [
                'label' => 'Alamat Tamu',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi!']
            ],
            'keperluan' => [
                'label' => 'Keperluan/Kunjungan Tamu',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi!']
            ],
            // 'terdaftar' => [
            //     'label' => 'Tanggal Kunjungan Tamu',
            //     'rules' => 'required',
            //     'errors' => ['required' => '{field} Wajib Diisi!']
            // ],
        ])) {
            // Jika Validasi Berhasil
            $data = [
                'nama' => $this->request->getPost('nama'),
                'no_telp' => $this->request->getPost('no_telp'),
                'terdaftar' => date('Y-m-d H:i:s'),
                'keperluan' => $this->request->getPost('keperluan'),
                'instansi' => $this->request->getPost('instansi'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
            ];

            // Mengirim Data Ke Function Insert Data Di Model Tamu
            $this->ModelTamu->InsertData($data);

            // Notifikasi Data Berhasil Disimpan
            session()->setFlashdata('insert', 'Data Tamu Berhasil Di Tambahkan!!');
            return redirect()->to('Home');
        } else {
            // Jika Tidak Lolos Validasi, kembalikan dengan error
            return redirect()->to('Home/index')->withInput()->with('validation', \Config\Services::validation());
        }
    }
}