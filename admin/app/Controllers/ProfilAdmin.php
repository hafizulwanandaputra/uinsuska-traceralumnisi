<?php

namespace App\Controllers;

use App\Models\ProfilAdminModel;
use App\Models\DelProfilModel;

class ProfilAdmin extends BaseController
{
    protected $ProfilAdminModel;
    protected $DelProfilModel;
    public function __construct()
    {
        $this->ProfilAdminModel = new ProfilAdminModel();
        $this->DelProfilModel = new DelProfilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profil Anda',
        ];
        return view('dashboard-admin/profil/index', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Profil Anda',
            'validation' => \Config\Services::validation()
        ];
        echo view('dashboard-admin/profil/edit', $data);
    }
    public function update()
    {
        if (session()->get('username') == $this->request->getVar('username')) {
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
            'foto_user' => [
                'label' => 'Foto Profil',
                'rules' => 'max_size[foto_user,2048]|is_image[foto_user]|mime_in[foto_user,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => '{field} harus kurang dari 2 MB!',
                    'is_image' => '{field} harus berupa file gambar!',
                    'mime_in' => '{field} harus file gambar yang valid!',
                ]
            ]
        ])) {
            return redirect()->to(base_url('/profil-admin/edit'))->withInput();
        }
        $fileFoto = $this->request->getFile('foto_user');
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(substr(FCPATH, 0, -6) . 'images/profile', $namaFoto);
            if ($this->request->getVar('fotoLama') != NULL) {
                unlink(substr(FCPATH, 0, -6) . 'images/profile/' . $this->request->getVar('fotoLama'));
            }
        }
        $this->ProfilAdminModel->save([
            'id_user' => session()->get('id_user'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'foto_user' => $namaFoto,
        ]);
        session()->remove('nama_lengkap');
        session()->remove('username');
        session()->remove('foto_user');
        session()->set('nama_lengkap', $this->request->getVar('nama_lengkap'));
        session()->set('username', $this->request->getVar('username'));
        session()->set('foto_user', $namaFoto);
        session()->setFlashdata('msg', 'Profil Anda berhasil diubah');
        return redirect()->to(base_url('/profil-admin'));
    }
    public function delprofilephoto()
    {
        unlink(substr(FCPATH, 0, -6) . 'images/profile/' . session()->get('foto_user'));
        $this->DelProfilModel->save([
            'id_user' => session()->get('id_user'),
            'foto_user' => NULL
        ]);
        session()->remove('foto_user');
        session()->set('foto_user', NULL);
        session()->setFlashdata('msg', 'Foto profil Anda berhasil diubah');
        return redirect()->to(base_url('/profil-admin'));
    }
}
