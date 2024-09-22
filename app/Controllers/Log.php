<?php

namespace App\Controllers;

use App\Models\LogModel;

class Log extends BaseController
{
    protected $LogModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->LogModel = new LogModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Data Log Status',
            'menu' => 'log',
            'page' => 'v_log',
            'log' => $this->LogModel->getAllLogs(),
        ];
        return view('v_template', $data);
        
    }
}
