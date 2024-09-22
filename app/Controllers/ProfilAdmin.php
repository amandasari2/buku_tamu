<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfilAdmin extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel;
    }

    public function index()
    {
        $data = [
            'judul' => 'Profil Setting',
            'menu' => 'profil',
            'page' => 'UserAdmin/profil',
            'user' => $this->UserModel->AllData(),
        ];
        return view('v_template', $data);
    }

    
}
