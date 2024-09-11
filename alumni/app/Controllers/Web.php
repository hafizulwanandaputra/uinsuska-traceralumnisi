<?php

namespace App\Controllers;

use App\Models\WebModel;

class Web extends BaseController
{
    protected $WebModel;
    public function __construct()
    {
        $this->WebModel = new WebModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $tabelalumni = $db->table('alumni');
        $mahasiswa = $this->WebModel->getAllAlumni();
        $alumnilulus = $this->WebModel->getGraduatedAlumni();
        $sudahkuesioner = $this->WebModel->getIsiKuesioner();
        $thnlulus = $tabelalumni->select('YEAR(tgl_lulus) AS tgl_lulus, COUNT(*) AS total')->where('tgl_lulus !=', NULL, FALSE)->where('aktif', 1)->groupBy('YEAR(tgl_lulus)')->get();
        $alumni = $tabelalumni->select('aktif, COUNT(*) AS total')->groupBy('aktif')->get();
        $kuesioner = $tabelalumni->select('kuesioner, COUNT(*) AS total')->where('aktif', 1)->groupBy('kuesioner')->get();
        $data = [
            'title' => 'Beranda',
            'mahasiswa' => $mahasiswa,
            'alumnilulus' => $alumnilulus,
            'sudahkuesioner' => $sudahkuesioner,
            'thnlulus' => $thnlulus,
            'alumni' => $alumni,
            'kuesioner' => $kuesioner,
        ];
        return view('web/index', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'Tentang Kami',
        ];
        return view('web/about', $data);
    }
}
