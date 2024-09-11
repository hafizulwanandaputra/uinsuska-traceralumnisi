<?php

namespace App\Controllers;

use App\Models\HomeAdminModel;
use App\Models\HomeAdminKuesioner;

class HomeAdmin extends BaseController
{
    protected $HomeAdminModel;
    protected $HomeAdminKuesioner;
    public function __construct()
    {
        $this->HomeAdminModel = new HomeAdminModel();
        $this->HomeAdminKuesioner = new HomeAdminKuesioner();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $tabelalumni = $db->table('alumni');
        $tabelkuesioner = $db->table('kuesioner');
        $mahasiswa = $this->HomeAdminModel->getAllAlumni();
        $alumnilulus = $this->HomeAdminModel->getGraduatedAlumni();
        $sudahkuesioner = $this->HomeAdminModel->getIsiKuesioner();
        $thnlulus = $tabelalumni->select('YEAR(tgl_lulus) AS tgl_lulus, COUNT(*) AS total')->where('tgl_lulus !=', NULL, FALSE)->where('aktif', 1)->groupBy('YEAR(tgl_lulus)')->get();
        $alumni = $tabelalumni->select('aktif, COUNT(*) AS total')->groupBy('aktif')->get();
        $kuesioner = $tabelalumni->select('kuesioner, COUNT(*) AS total')->where('aktif', 1)->groupBy('kuesioner')->get();
        $bekerja = $tabelkuesioner->select('bekerja, COUNT(*) AS total')->groupBy('bekerja')->get();
        $sesuaiilmu = $tabelkuesioner->select('sesuai_ilmu, COUNT(*) AS total')->where('bekerja', 1)->groupBy('sesuai_ilmu')->get();
        $dapatkerja = $tabelkuesioner->select('dapat_kerja, COUNT(*) AS total')->where('bekerja', 1)->groupBy('dapat_kerja')->get();
        $jenis = $tabelkuesioner->select('jenis, COUNT(*) AS total')->where('bekerja', 1)->groupBy('jenis')->get();
        $status = $tabelkuesioner->select('status, COUNT(*) AS total')->where('bekerja', 1)->groupBy('status')->get();
        $penghasilan = $tabelkuesioner->select('penghasilan, COUNT(*) AS total')->where('bekerja', 1)->groupBy('penghasilan')->get();
        $data = [
            'title' => 'Beranda',
            'mahasiswa' => $mahasiswa,
            'alumnilulus' => $alumnilulus,
            'sudahkuesioner' => $sudahkuesioner,
            'thnlulus' => $thnlulus,
            'alumni' => $alumni,
            'kuesioner' => $kuesioner,
            'bekerja' => $bekerja,
            'sesuaiilmu' => $sesuaiilmu,
            'dapatkerja' => $dapatkerja,
            'jenis' => $jenis,
            'status' => $status,
            'penghasilan' => $penghasilan
        ];
        return view('dashboard-admin/home/index', $data);
    }
}
