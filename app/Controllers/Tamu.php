<?php

namespace App\Controllers;

use App\Models\ModelTamu;

class Tamu extends BaseController
{
    protected $ModelTamu;
    public function __construct()
    {
        $this->ModelTamu = new ModelTamu();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Data Tamu',
            'menu' => 'tamu',
            'page' => 'BukuTamu/v_tamu',
            'tamu' => $this->ModelTamu->AllData(),
        ];
        return view('v_template', $data);
    }

    public function Input()
    {

        $data = [
            'judul' => 'Input Data Tamu',
            'menu' => 'tamu',
            'page' => 'BukuTamu/v_input',
            'tamu' => $this->ModelTamu->AllData(),
        ];

        return view('v_template', $data);
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
            return redirect()->to('Tamu');
        } else {
            // Jika Tidak Lolos Validasi, kembalikan dengan error
            return redirect()->to('Tamu/Input')->withInput()->with('validation', \Config\Services::validation());
        }
    }

    public function EditTamu($id)
    {
        $data = [
            'judul' => 'Edit Data Tamu',
            'menu' => 'tamu',
            'page' => 'BukuTamu/v_edittamu',
            'tamu' => $this->ModelTamu->DetailData($id),

        ];
        return view('v_template', $data);
    }

    public function UpdateData($id)
    {
        // Validasi input form
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
        ])) {
            // Jika Validasi Berhasil
            $data = [
                'id' => $id, // id tamu yang mau diupdate
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'instansi' => $this->request->getPost('instansi'),
                'no_telp' => $this->request->getPost('no_telp'),
                'alamat' => $this->request->getPost('alamat'),
                'keperluan' => $this->request->getPost('keperluan'),
                // update waktu terdaftar dengan timestamp sekarang
                'terdaftar' => date('Y-m-d H:i:s'),
            ];

            // Mengirim Data ke Model Tamu untuk proses update
            $this->ModelTamu->UpdateData($data);

            // Notifikasi Data Berhasil Diupdate
            session()->setFlashdata('update', 'Data Tamu Berhasil Di Update!!');
            return redirect()->to('Tamu');
        } else {
            // Jika Validasi Gagal
            return redirect()->to(base_url('Tamu/EditTamu/' . $id))->withInput();
        }
    }

    public function Delete($id)
    {
        // Menghapus data tamu berdasarkan ID
        $this->ModelTamu->DeleteData($id);

        // Notifikasi Data Berhasil Dihapus
        session()->setFlashdata('delete', 'Data Tamu Berhasil Dihapus!');
        return redirect()->to('Tamu');
    }
}
