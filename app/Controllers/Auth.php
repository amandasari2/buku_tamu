<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;
use App\Models\LogModel;

class Auth extends BaseController
{
    protected $LogModel;
    protected $ModelAuth;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->LogModel = new LogModel();
    }

    public function Login()
    {
        $data = [
            'judul' => 'Login'
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
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
        ])) {
            // Jika Login
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Ambil data user berdasarkan email
            $CekLogin = $this->ModelAuth->login($email);

            if ($CekLogin && password_verify($password, $CekLogin['password'])) {
                // Jika Datanya Cocok
                session()->set('log', true);
                session()->set('id', $CekLogin['id']);
                session()->set('nama', $CekLogin['nama']);
                session()->set('level', $CekLogin['level']);
                session()->set('foto', $CekLogin['foto']);

                // Log aktivitas login
                $ipAddress = $this->request->getIPAddress();
                $device = $this->request->getUserAgent()->getBrowser() . ' ' . $this->request->getUserAgent()->getVersion();
                $logData = [
                    'idUser' => $CekLogin['id'],
                    'ipAddress' => $ipAddress,
                    'device' => $device,
                    'status' => 'Login',
                    'terdaftar' => date('Y-m-d H:i:s'), 
                ];
                $this->LogModel->save($logData);

                return redirect()->to(base_url('Dashboard'));
            } else {
                session()->setFlashdata('pesan', 'Email atau Password Anda Salah!');
                return redirect()->to(base_url('Auth/Login'));
            }
        } else {
            // Jika Tidak Lolos Validasi
            return redirect()->to(base_url('Auth/Login'))->withInput();
        }
    }

    public function Logout()
    {
        $userId = session()->get('id'); // Ambil ID user dari sesi
        if ($userId) {
            $ipAddress = $this->request->getIPAddress();
            $device = $this->request->getUserAgent()->getBrowser() . ' ' . $this->request->getUserAgent()->getVersion();
            $logData = [
                'idUser' => $userId,
                'ipAddress' => $ipAddress,
                'device' => $device,
                'status' => 'Logout',
                'terdaftar' => date('Y-m-d H:i:s'),
            ];
            $this->LogModel->save($logData);

            session()->remove('log');
            session()->remove('id');
            session()->remove('nama');
            session()->remove('level');
            session()->remove('foto');

            session()->setFlashdata('logout', 'Apakah Anda yakin ingin keluar?');
        }

        return redirect()->to(base_url('Auth/Login'));
    }
}
