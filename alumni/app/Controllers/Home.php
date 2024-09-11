<?php

namespace App\Controllers;

use App\Models\PengumumanModel;

class Home extends BaseController
{
    protected $PengumumanModel;
    public function __construct()
    {
        $this->PengumumanModel = new PengumumanModel();
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }

    public function index()
    {
        if (session()->get('tgl_lulus') != NULL || session()->get('ijazah') != NULL || session()->get('sk_lulus') != NULL || session()->get('transkrip_nilai') != NULL) {
            $data = [
                'title' => 'Beranda'
            ];
            return view('dashboard/home/index', $data);
        } else {
            return redirect()->to(base_url('/activation'));
        }
    }
}
