<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $AdminModel;
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        // $currentPage = $this->request->getVar('page_pengumuman') ? $this->request->getVar('page_pengumuman') : 1;
        if (session()->get('type') == 1) {
            $keyword = $this->request->getVar('keyword');
            if ($keyword) {
                $admin = $this->AdminModel->search($keyword)->where('id_user !=', session()->get('id_user'))->orderBy('id_user', 'DESC');
                $totaladmin = $this->AdminModel->search($keyword)->where('id_user !=', session()->get('id_user'))->countAllResults(false);
            } else {
                $admin = $this->AdminModel->where('id_user !=', session()->get('id_user'))->orderBy('id_user', 'DESC');
                $totaladmin = $this->AdminModel->where('id_user !=', session()->get('id_user'))->countAllResults(false);
            }
            $data = [
                'title' => 'Admin (' . $totaladmin . ')',
                'admin' => $admin->getAdmin(),
                'totaladmin' => $totaladmin,
                'pager' => $this->AdminModel->pager,
                'keyword' => $keyword
                // 'currentPage' => $currentPage
            ];
            return view('dashboard-admin/admin/index', $data);
        } else if (session()->get('type') == 2) {
            $data = [
                'title' => 'Admin'
            ];
            return view('dashboard-admin/admin/blocked', $data);
        }
    }
    public function details($id)
    {
        if (session()->get('type') == 1) {
            $admin = $this->AdminModel->getAdmin($id);
            if ($admin['id_user'] == session()->get('id_user')) {
                return redirect()->to(base_url('/profil-admin'));
            } else {
                $title = $admin['nama_lengkap'];
                $data = [
                    'title' => $title,
                    'admin' => $this->AdminModel->getAdmin($id)
                ];
                if (empty($data['admin'])) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Admin dengan ID ' . $id . ' tidak ditemukan.');
                }
                return view('dashboard-admin/admin/details', $data);
            }
        } else if (session()->get('type') == 2) {
            $data = [
                'title' => 'Admin'
            ];
            return view('dashboard-admin/admin/blocked', $data);
        }
    }

    public function create()
    {
        if (session()->get('type') == 1) {
            $data = [
                'title' => 'Tambah Admin',
                'validation' => \Config\Services::validation()
            ];
            return view('dashboard-admin/admin/create', $data);
        } else if (session()->get('type') == 2) {
            $data = [
                'title' => 'Admin'
            ];
            return view('dashboard-admin/admin/blocked', $data);
        }
    }

    public function save()
    {
        if (!$this->validate([
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'username' => [
                'label' => 'Nama Pengguna',
                'rules' => 'required|is_unique[user.username]|alpha_numeric_punct',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'is_unique' => '{field} harus berbeda dengan {field} lainnya!'
                ]
            ],
            'type' => [
                'label' => 'Jenis Pengguna',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/create'))->withInput();
        }
        $password = password_hash($this->request->getVar('username'), PASSWORD_DEFAULT);
        $this->AdminModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'type' => $this->request->getVar('type'),
            'active' => 0
        ]);
        session()->setFlashdata('msg', $this->request->getVar('nama_lengkap') . ' (@' . $this->request->getVar('username') . ') berhasil ditambahkan');
        return redirect()->to(base_url('/admin'));
    }
    public function delete($id)
    {
        $admin = $this->AdminModel->find($id);
        if ($admin['foto_user'] != NULL) {
            unlink(substr(FCPATH, 0, -6) . 'images/profile/' . $admin['foto_user']);
        }
        $this->AdminModel->delete($id);
        session()->setFlashdata('msg', $admin['nama_lengkap'] . ' (@' . $admin['username'] . ') berhasil dihapus');
        return redirect()->to(base_url('/admin'));
    }
    public function edit($id)
    {
        if (session()->get('type') == 1) {
            $admin = $this->AdminModel->getAdmin($id);
            if ($admin['id_user'] == session()->get('id_user')) {
                return redirect()->to(base_url('/profil-admin/edit'));
            } else {
                $title = $admin['nama_lengkap'];
                $data = [
                    'title' => 'Edit "' . $title . '"',
                    'validation' => \Config\Services::validation(),
                    'admin' => $admin
                ];
                return view('dashboard-admin/admin/edit', $data);
            }
        } else if (session()->get('type') == 2) {
            $data = [
                'title' => 'Admin'
            ];
            return view('dashboard-admin/admin/blocked', $data);
        }
    }
    public function update($id)
    {
        $admin = $this->AdminModel->getAdmin($id);
        $password = $admin['password'];
        $active = $admin['active'];
        if ($admin['username'] == $this->request->getVar('username')) {
            $username = 'required|alpha_numeric_punct';
        } else {
            $username = 'required|is_unique[user.username]|alpha_numeric_punct';
        }
        if (!$this->validate([
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'username' => [
                'label' => 'Nama Pengguna',
                'rules' => $username,
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'is_unique' => '{field} harus berbeda dengan {field} lainnya!'
                ]
            ],
            'type' => [
                'label' => 'Jenis Pengguna',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/edit/' . $id))->withInput();
        }
        $this->AdminModel->save([
            'id_user' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'type' => $this->request->getVar('type'),
            'active' => $active
        ]);
        session()->setFlashdata('msg', 'Akun ini berhasil diubah');
        return redirect()->to(base_url('/admin/' . $id));
    }
    public function activate($id)
    {
        $admin = $this->AdminModel->getAdmin($id);
        $nama_lengkap = $admin['nama_lengkap'];
        $username = $admin['username'];
        $password = $admin['password'];
        $type = $admin['type'];
        $this->AdminModel->save([
            'id_user' => $id,
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'type' => $type,
            'active' => 1
        ]);
        session()->setFlashdata('msg', 'Akun ini berhasil diaktifkan');
        return redirect()->to(base_url('/admin/' . $id));
    }
    public function deactivate($id)
    {
        $admin = $this->AdminModel->getAdmin($id);
        $nama_lengkap = $admin['nama_lengkap'];
        $username = $admin['username'];
        $password = $admin['password'];
        $type = $admin['type'];
        $this->AdminModel->save([
            'id_user' => $id,
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'type' => $type,
            'active' => 0
        ]);
        session()->setFlashdata('msg', 'Akun ini berhasil dinonaktifkan');
        return redirect()->to(base_url('/admin/' . $id));
    }
    public function resetpassword($id)
    {
        $admin = $this->AdminModel->getAdmin($id);
        $nama_lengkap = $admin['nama_lengkap'];
        $username = $admin['username'];
        $password = password_hash($username, PASSWORD_DEFAULT);
        $type = $admin['type'];
        $active = $admin['active'];
        $this->AdminModel->save([
            'id_user' => $id,
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'type' => $type,
            'active' => $active
        ]);
        session()->setFlashdata('msg', 'Akun ini berhasil direset kata sandinya');
        return redirect()->to(base_url('/admin/' . $id));
    }
}
