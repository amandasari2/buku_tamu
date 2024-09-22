<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel;
    }
    public function index()
    {
        $data = [
            'judul' => 'Manajemen User',
            'menu' => 'user',
            'page' => 'UserAdmin/user',
            'user' => $this->UserModel->AllData(),
        ];
        return view('v_template', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Input User',
            'menu' => 'user',
            'page' => 'UserAdmin/insert',
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'telpon' => [
                'label' => 'No Telepon User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'username' => [
                'label' => 'Username User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'level' => [
                'label' => 'Level User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'foto' => [
                'label' => 'Foto User',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi!!',
                    'max_size' => 'Ukuran {field} Terlalu Besar!',
                    'mime_in' => 'Format {field} Harus Berupa JPG, JPEG, PNG!'
                ]
            ],

        ])) {
            $foto_user = $this->request->getFile('foto');
            $nama_file_foto = $foto_user->getRandomName();
            // Jika Validasi Berhasil
            $data = [
                'nama' => $this->request->getPost('nama'),
                'telpon' => $this->request->getPost('telpon'),
                'username' => $this->request->getPost('username'),
                'level' => $this->request->getPost('level'),
                'terdaftar' => date('Y-m-d H:i:s'),
                'email' => $this->request->getPost('email'),
                'password' => sha1($this->request->getPost('password') . $this->request->getPost('email')),
                'foto' => $nama_file_foto,
            ];
            $foto_user->move('foto', $nama_file_foto);
            //Mengirim Data Ke Function Insert Data Di Model User
            $this->UserModel->InsertData($data);
            //Notifikasi Data Berhasil Disimpan
            session()->setFlashdata('insert', 'Data User Berhasil Di Tambahkan!!');
            return redirect()->to('User');
        } else {
            //Jika Tidak Lolos Validasi
            return redirect()->to(base_url('User/Input'))->withInput();
        }
    }

    public function Profil($id)
    {
        $data = [
            'judul' => 'Profil Setting',
            'menu' => 'profil',
            'page' => 'UserAdmin/profil',
            'user' => $this->UserModel->DetailData($id),
        ];
        return view('v_template', $data);
    }

    public function UpdateData($id)
    {
        if ($this->validate([
            // Field lain tetap sama
            'foto' => [
                'label' => 'Foto User',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Terlalu Besar!',
                    'mime_in' => 'Format {field} Harus Berupa JPG, JPEG, PNG!'
                ]
            ],
    
        ])) {
            $foto_user = $this->request->getFile('foto');
    
            // Dapatkan data user lama
            $user = $this->UserModel->DetailData($id);
    
            // Jika password diisi, hash dan update. Jika tidak, biarkan password lama.
            $password = $this->request->getPost('password');
            if (!empty($password)) {
                $hashed_password = sha1($password . $this->request->getPost('email'));
            } else {
                $hashed_password = $user['password']; // Gunakan password lama jika tidak diisi
            }
    
            if ($foto_user->getError() == 4) {
                // Jika tidak mengupload foto baru
                $data = [
                    'id' => $id,
                    'nama' => $this->request->getPost('nama'),
                    'telpon' => $this->request->getPost('telpon'),
                    'username' => $this->request->getPost('username'),
                    'level' => $this->request->getPost('level'),
                    'terdaftar' => date('Y-m-d H:i:s'),
                    'email' => $this->request->getPost('email'),
                    'password' => $hashed_password, // Simpan password yang sudah di-hash atau yang lama
                ];
                $this->UserModel->UpdateData($data);
            } else {
                // Menghapus Foto user Yang Lama
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                // Merandom File Foto user
                $nama_file_foto = $foto_user->getRandomName();
                $data = [
                    'id' => $id,
                    'nama' => $this->request->getPost('nama'),
                    'telpon' => $this->request->getPost('telpon'),
                    'username' => $this->request->getPost('username'),
                    'level' => $this->request->getPost('level'),
                    'terdaftar' => date('Y-m-d H:i:s'),
                    'email' => $this->request->getPost('email'),
                    'password' => $hashed_password, // Simpan password yang sudah di-hash atau yang lama
                    'foto' => $nama_file_foto,
                ];
                $this->UserModel->UpdateData($data);
                $foto_user->move('foto', $nama_file_foto);
            }
    
            //Notifikasi Data Berhasil Disimpan
            session()->setFlashdata('update', 'Data Admin Berhasil Di Update!!');
            return redirect()->to('User/Profil/' . $id);
        } else {
            //Jika Tidak Lolos Validasi
            return redirect()->to(base_url('User/Profil/' . $id))->withInput();
        }
    }
}
