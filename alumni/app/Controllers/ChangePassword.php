<?php

namespace App\Controllers;

use App\Models\ChangePasswordModel;

class ChangePassword extends BaseController
{
    protected $ChangePasswordModel;
    public function __construct()
    {
        $this->ChangePasswordModel = new ChangePasswordModel();
    }

    public function index()
    {
        if (session()->get('tgl_lulus') != NULL || session()->get('ijazah') != NULL || session()->get('sk_lulus') != NULL || session()->get('transkrip_nilai') != NULL) {
            $data = [
                'title' => 'Ubah Kata Sandi',
            ];
            return view('dashboard/changepassword/index', $data);
        } else {
            return redirect()->to(base_url('/activation'));
        }
    }
    public function update()
    {
        if (!$this->validate([
            'current_password' => [
                'label' => 'Kata Sandi Saat Ini',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'new_password1' => [
                'label' => 'Kata Sandi Baru',
                'rules' => 'required|min_length[6]|matches[new_password2]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'min_length' => '{field} wajib minimum 6 karakter!',
                    'matches' => '{field} tidak cocok dengan Konfirmasi Kata Sandi!'
                ]
            ],
            'new_password2' => [
                'label' => 'Konfirmasi Kata Sandi',
                'rules' => 'required|min_length[6]|matches[new_password1]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'min_length' => '{field} wajib minimum 6 karakter!',
                    'matches' => '{field} tidak cocok dengan Kata Sandi Baru!'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/changepassword'))->withInput();
        }
        $current_password = $this->request->getVar('current_password');
        $new_password = $this->request->getVar('new_password1');
        if (!password_verify($current_password, session()->get('password'))) {
            session()->setFlashdata('error', 'Kata sandi lama Anda salah!');
            return redirect()->to(base_url('/changepassword'));
        } else {
            if ($current_password == $new_password) {
                session()->setFlashdata('error', 'Kata sandi baru <strong>harus berbeda</strong> dengan kata sandi lama!');
                return redirect()->to(base_url('/changepassword'));
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->ChangePasswordModel->save([
                    'id_alumni' => session()->get('id_alumni'),
                    'password' => $password_hash
                ]);
                session()->remove('password');
                session()->set('password', $password_hash);
                session()->setFlashdata('msg', 'Kata sandi Anda berhasil diubah dengan kata sandi baru Anda!');
                return redirect()->to(base_url('/changepassword'));
            }
        }
    }
}
