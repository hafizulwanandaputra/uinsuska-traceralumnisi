<?php

namespace App\Controllers;

use App\Models\AuthAdminModel;

class AuthAdmin extends BaseController
{
    protected $AuthAdminModel;
    public function __construct()
    {
        $this->AuthAdminModel = new AuthAdminModel();
    }

    public function index()
    {
        return view('auth-admin/login');
    }

    public function check_login()
    {
        if (!$this->validate([
            'username' => [
                'label' => 'Nama Pengguna',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'password' => [
                'label' => 'Kata Sandi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/'))->withInput();
        }
        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');
        $check = $this->AuthAdminModel->login($username);
        if ($check) {
            if ($check['active'] == 1) {
                if (password_verify($password, $check['password'])) {
                    session()->set('log', true);
                    session()->set('id_user', $check['id_user']);
                    session()->set('nama_lengkap', $check['nama_lengkap']);
                    session()->set('username', $check['username']);
                    session()->set('password', $check['password']);
                    session()->set('foto_user', $check['foto_user']);
                    session()->set('type', $check['type']);
                    session()->set('active', $check['active']);
                    return redirect()->to(base_url('/home-admin'));
                } else {
                    session()->setFlashdata('error', 'Kata sandi salah!');
                    return redirect()->to(base_url('/'));
                }
            } else {
                session()->setFlashdata('error', 'Anda ditangguhkan!');
                return redirect()->to(base_url('/'));
            }
        } else {
            session()->setFlashdata('error', 'Nama pengguna tidak terdaftar!');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('id_user');
        session()->remove('nama_lengkap');
        session()->remove('username');
        session()->remove('password');
        session()->remove('foto_user');
        session()->remove('type');
        session()->remove('active');
        session()->setFlashdata('msg', 'Terima kasih');
        return redirect()->to(base_url('/'));
    }

    public function register()
    {
        $data = [
            'title' => 'V1RST | Test'
        ];
        return view('auth-admin/register', $data);
    }

    public function save_register()
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
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'is_unique' => '{field} ini sudah ada!'
                ]
            ],
            'password' => [
                'label' => 'Kata Sandi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'password2' => [
                'label' => 'Konfirmasi Kata Sandi',
                'rules' => 'required|matches[password2]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'matches' => '{field} tidak sama.'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/register'))->withInput();
        }
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->AuthAdminModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'foto_user' => NULL,
            'type' => 1,
            'active' => 1,
        ]);
        session()->setFlashdata('msg', 'Berhasil registrasi');
        return redirect()->to(base_url('/'));
    }
}
