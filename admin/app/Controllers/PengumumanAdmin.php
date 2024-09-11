<?php

namespace App\Controllers;

use App\Models\PengumumanAdminModel;
use App\Models\PengumumanAdmin2Model;

class PengumumanAdmin extends BaseController
{
    protected $PengumumanAdminModel;
    protected $PengumumanAdmin2Model;
    public function __construct()
    {
        $this->PengumumanAdminModel = new PengumumanAdminModel();
        $this->PengumumanAdmin2Model = new PengumumanAdmin2Model();
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }

    public function index()
    {
        // $currentPage = $this->request->getVar('page_pengumuman') ? $this->request->getVar('page_pengumuman') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pengumuman = $this->PengumumanAdminModel->search($keyword)->orderBy('tgl_posting', 'DESC');
            $totalpengumuman = $this->PengumumanAdminModel->search($keyword)->countAllResults(false);
        } else {
            $pengumuman = $this->PengumumanAdminModel->orderBy('tgl_posting', 'DESC');
            $totalpengumuman = $this->PengumumanAdminModel->countAllResults(false);
        }
        $data = [
            'title' => 'Pengumuman (' . $totalpengumuman . ')',
            'pengumuman' => $pengumuman->getPengumuman(),
            'totalpengumuman' => $totalpengumuman,
            'pager' => $this->PengumumanAdminModel->pager,
            'keyword' => $keyword
            // 'currentPage' => $currentPage
        ];
        return view('dashboard-admin/pengumuman/index', $data);
    }
    public function details($id)
    {
        $pengumuman = $this->PengumumanAdminModel->getPengumuman($id);
        $title = $pengumuman['judul'];
        $data = [
            'title' => $title,
            'pengumuman' => $this->PengumumanAdminModel->getPengumuman($id)
        ];
        if (empty($data['pengumuman'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('pengumuman dengan ID ' . $id . ' tidak ditemukan.');
        }
        return view('dashboard-admin/pengumuman/details', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Buat Pengumuman',
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard-admin/pengumuman/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|is_unique[pengumuman.judul]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'is_unique' => '{field} harus berbeda dengan {field} lainnya!'
                ]
            ],
            'isi' => [
                'label' => 'Isi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/pengumuman-admin/create'))->withInput();
        }
        $this->PengumumanAdminModel->save([
            'judul' => $this->request->getVar('judul'),
            'isi' => $this->request->getVar('isi'),
            'posted' => 0
        ]);
        session()->setFlashdata('msg', '"' . $this->request->getVar('judul') . '" berhasil ditambahkan');
        return redirect()->to(base_url('/pengumuman-admin'));
    }
    public function delete($id)
    {
        $pengumuman = $this->PengumumanAdminModel->find($id);
        $this->PengumumanAdminModel->delete($id);
        session()->setFlashdata('msg', '"' . $pengumuman['judul'] . '" berhasil dihapus');
        return redirect()->to(base_url('/pengumuman-admin'));
    }
    public function edit($id)
    {
        $pengumuman = $this->PengumumanAdminModel->getPengumuman($id);
        $title = $pengumuman['judul'];
        $data = [
            'title' => 'Edit "' . $title . '"',
            'validation' => \Config\Services::validation(),
            'pengumuman' => $pengumuman
        ];
        return view('dashboard-admin/pengumuman/edit', $data);
    }
    public function update($id)
    {
        $pengumuman = $this->PengumumanAdminModel->getPengumuman($id);
        $posted = $pengumuman['posted'];
        if ($pengumuman['judul'] == $this->request->getVar('judul')) {
            $judul = 'required';
        } else {
            $judul = 'required|is_unique[pengumuman.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'label' => 'Judul',
                'rules' => $judul,
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'is_unique' => '{field} harus berbeda dengan {field} lainnya!'
                ]
            ],
            'isi' => [
                'label' => 'Isi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/pengumuman-admin/edit/' . $id))->withInput();
        }
        $this->PengumumanAdminModel->save([
            'id_pengumuman' => $id,
            'judul' => $this->request->getVar('judul'),
            'isi' => $this->request->getVar('isi'),
            'posted' => $posted
        ]);
        session()->setFlashdata('msg', 'Pengumuman ini berhasil diubah');
        return redirect()->to(base_url('/pengumuman-admin/' . $id));
    }
    public function post($id)
    {
        $pengumuman = $this->PengumumanAdmin2Model->getPengumuman($id);
        $judul = $pengumuman['judul'];
        $this->PengumumanAdmin2Model->save([
            'id_pengumuman' => $id,
            'judul' => $judul,
            'posted' => 1
        ]);
        session()->setFlashdata('msg', 'Pengumuman ini berhasil diposting');
        return redirect()->to(base_url('/pengumuman-admin/' . $id));
    }
    public function draft($id)
    {
        $pengumuman = $this->PengumumanAdmin2Model->getPengumuman($id);
        $judul = $pengumuman['judul'];
        $this->PengumumanAdmin2Model->save([
            'id_pengumuman' => $id,
            'judul' => $judul,
            'posted' => 0
        ]);
        session()->setFlashdata('msg', 'Pengumuman ini berhasil didraf');
        return redirect()->to(base_url('/pengumuman-admin/' . $id));
    }
}
