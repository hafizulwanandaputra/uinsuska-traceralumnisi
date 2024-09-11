<?php

namespace App\Controllers;

use App\Models\PengumumanModel;

class Pengumuman extends BaseController
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
            $currentPage = $this->request->getVar('page_pengumuman') ? $this->request->getVar('page_pengumuman') : 1;
            $keyword = $this->request->getVar('keyword');
            if ($keyword) {
                $pengumuman = $this->PengumumanModel->search($keyword)->where('posted', 1)->orderBy('tgl_posting', 'DESC');
                $totalpengumuman = $this->PengumumanModel->search($keyword)->where('posted', 1)->countAllResults(false);
            } else {
                $pengumuman = $this->PengumumanModel->where('posted', 1)->orderBy('tgl_posting', 'DESC');
                $totalpengumuman = $this->PengumumanModel->where('posted', 1)->countAllResults(false);
            }
            $data = [
                'title' => 'Pengumuman',
                'pengumuman' => $pengumuman->getPengumuman(),
                'totalpengumuman' => $totalpengumuman,
                'pager' => $this->PengumumanModel->pager,
                'keyword' => $keyword,
                'currentPage' => $currentPage
            ];
            return view('dashboard/pengumuman/index', $data);
        } else {
            return redirect()->to(base_url('/activation'));
        }
    }
}
