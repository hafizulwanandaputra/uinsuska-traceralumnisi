<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\Activation;

class Auth extends BaseController
{
    protected $AuthModel;
    protected $Activation;
    protected $pekerjaan;
    public function __construct()
    {
        $this->AuthModel = new AuthModel();
        $this->Activation = new Activation();
        $this->pekerjaan = [
            'Belum/Tidak Bekerja',
            'Mengurus Rumah Tangga',
            'Pelajar/Mahasiswa',
            'Pensiunan',
            'Pegawai Negeri Sipil',
            'Tentara Nasional Indonesia',
            'Kepolisian RI',
            'Perdagangan',
            'Petani/Pekebun',
            'Peternak',
            'Nelayan/Perikanan',
            'Industri',
            'Konstruksi',
            'Transportasi',
            'Karyawan Swasta',
            'Karyawan BUMN',
            'Karyawan BUMD',
            'Karyawan Honorer',
            'Buruh Harian Lepas',
            'Buruh Tani/Perkebunan',
            'Buruh Nelayan/Perikanan',
            'Buruh Peternakan',
            'Pembantu Rumah Tangga',
            'Tukang Cukur',
            'Tukang Listrik',
            'Tukang Batu',
            'Tukang Kayu',
            'Tukang Sol Sepatu',
            'Tukang Las/Pandai Besi',
            'Tukang Jahit',
            'Tukang Gigi',
            'Penata Rias',
            'Penata Busana',
            'Penata Rambut',
            'Mekanik',
            'Seniman',
            'Tabib',
            'Paraji',
            'Perancang Busana',
            'Penterjemah',
            'Imam Masjid',
            'Pendeta',
            'Pastor',
            'Wartawan',
            'Ustadz/Mubaligh',
            'Juru Masak',
            'Promotor Acara',
            'Anggota DPR-RI',
            'Anggota DPD',
            'Anggota BPK',
            'Presiden',
            'Wakil Presiden',
            'Anggota Mahkamah Konstitusi',
            'Anggota Kabinet/Kementerian',
            'Duta Besar',
            'Gubernur',
            'Wakil Gubernur',
            'Bupati',
            'Wakil Bupati',
            'Walikota',
            'Wakil Walikota',
            'Anggota DPRD Provinsi',
            'Anggota DPRD Kabupaten/Kota',
            'Dosen',
            'Guru',
            'Pilot',
            'Pengacara',
            'Notaris',
            'Arsitek',
            'Akuntan',
            'Konsultan',
            'Dokter',
            'Bidan',
            'Perawat',
            'Apoteker',
            'Psikiater/Psikolog',
            'Penyiar Televisi',
            'Penyiar Radio',
            'Pelaut',
            'Peneliti',
            'Sopir',
            'Pialang',
            'Paranormal',
            'Pedagang',
            'Perangkat Desa',
            'Kepala Desa',
            'Biarawati',
            'Wiraswasta',
            'Lainnya'
        ];
    }

    public function index()
    {
        return view('auth/login');
    }

    public function activation()
    {
        if (session()->get('tgl_lulus') == NULL || session()->get('ijazah') == NULL || session()->get('sk_lulus') == NULL || session()->get('transkrip_nilai') == NULL) {
            $data = [
                'title' => 'Aktivasi Akun',
                'listpekerjaan' => $this->pekerjaan
            ];
            return view('auth/activation', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
    public function activate()
    {
        if (!$this->validate([
            'tgl_lulus' => [
                'label' => 'Tanggal Lulus',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'alamat_rumah' => [
                'label' => 'Alamat Rumah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'nomor_hp' => [
                'label' => 'Nomor HP',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'pekerjaan' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'ijazah' => [
                'label' => 'Ijazah',
                'rules' => 'uploaded[ijazah]|max_size[ijazah,2048]|ext_in[ijazah,pdf]|mime_in[ijazah,application/pdf]',
                'errors' => [
                    'uploaded' => '{field} belum diunggah!',
                    'max_size' => '{field} harus kurang dari 2 MB!',
                    'ext_in' => 'ekstensi file untuk {field} harus PDF!',
                    'mime_in' => 'File untuk {field} bukan PDF yang valid!'
                ]
            ],
            'sk_lulus' => [
                'label' => 'Surat Keterangan Lulus',
                'rules' => 'max_size[sk_lulus,2048]|ext_in[sk_lulus,pdf]|mime_in[sk_lulus,application/pdf]',
                'errors' => [
                    'max_size' => '{field} harus kurang dari 2 MB!',
                    'ext_in' => 'ekstensi file untuk {field} harus PDF!',
                    'mime_in' => 'File untuk {field} bukan PDF yang valid!'
                ]
            ],
            'transkrip_nilai' => [
                'label' => 'Transkrip Nilai Akademik',
                'rules' => 'uploaded[transkrip_nilai]|max_size[transkrip_nilai,2048]|ext_in[transkrip_nilai,pdf]|mime_in[transkrip_nilai,application/pdf]',
                'errors' => [
                    'uploaded' => '{field} belum diunggah!',
                    'max_size' => '{field} harus kurang dari 2 MB!',
                    'ext_in' => 'ekstensi file untuk {field} harus PDF!',
                    'mime_in' => 'File untuk {field} bukan PDF yang valid!'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/activation'))->withInput();
        }
        $ijazah = $this->request->getFile('ijazah');
        $sk_lulus = $this->request->getFile('sk_lulus');
        $transkrip_nilai = $this->request->getFile('transkrip_nilai');
        // SURAT KETERANGAN LULUS
        if ($sk_lulus->getError() == 4) {
            $filesk_lulus = NULL;
        } else {
            $filesk_lulus = $sk_lulus->getRandomName();
            $sk_lulus->move(FCPATH . 'files/sk_lulus', $filesk_lulus);
        }
        $fileijazah = $ijazah->getRandomName();
        $filetranskrip_nilai = $transkrip_nilai->getRandomName();
        $ijazah->move(FCPATH . 'files/ijazah', $fileijazah);
        $transkrip_nilai->move(FCPATH . 'files/transkrip_nilai', $filetranskrip_nilai);
        $this->Activation->save([
            'id_alumni' => session()->get('id_alumni'),
            'alamat_rumah' => $this->request->getVar('alamat_rumah'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'nomor_hp_2' => $this->request->getVar('nomor_hp_2'),
            'tgl_lulus' => $this->request->getVar('tgl_lulus'),
            'email' => $this->request->getVar('email'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'ijazah' => $fileijazah,
            'sk_lulus' => $filesk_lulus,
            'transkrip_nilai' => $filetranskrip_nilai
        ]);
        session()->remove('logalumni');
        session()->remove('id_alumni');
        session()->remove('nama_alumni');
        session()->remove('jenis_kelamin');
        session()->remove('agama');
        session()->remove('tempat_lahir');
        session()->remove('tgl_lahir');
        session()->remove('alamat_rumah');
        session()->remove('nomor_hp');
        session()->remove('nomor_hp_2');
        session()->remove('email');
        session()->remove('pekerjaan');
        session()->remove('aktif');
        session()->remove('tgl_lulus');
        session()->remove('kuesioner');
        session()->remove('ijazah');
        session()->remove('sk_lulus');
        session()->remove('transkrip_nilai');
        session()->remove('foto_alumni');
        session()->remove('password');
        session()->setFlashdata('msg', 'Terima kasih sudah mengirim informasi penting untuk aktivasi. Silakan tunggu admin mengaktifkan akun Anda!');
        return redirect()->to(base_url('/login'));
    }

    public function check_login()
    {
        if (!$this->validate([
            'nim_alumni' => [
                'label' => 'NIM',
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
            return redirect()->to(base_url('/login'))->withInput();
        }
        $nim_alumni = $this->request->getPost('nim_alumni');
        $password = $this->request->getVar('password');
        $check = $this->AuthModel->login($nim_alumni);
        if ($check) {
            if ($check['aktif'] == 1) {
                if (password_verify($password, $check['password'])) {
                    session()->set('logalumni', true);
                    session()->set('id_alumni', $check['id_alumni']);
                    session()->set('nim_alumni', $check['nim_alumni']);
                    session()->set('nama_alumni', $check['nama_alumni']);
                    session()->set('jenis_kelamin', $check['jenis_kelamin']);
                    session()->set('agama', $check['agama']);
                    session()->set('tempat_lahir', $check['tempat_lahir']);
                    session()->set('tgl_lahir', $check['tgl_lahir']);
                    session()->set('alamat_rumah', $check['alamat_rumah']);
                    session()->set('nomor_hp', $check['nomor_hp']);
                    session()->set('nomor_hp_2', $check['nomor_hp_2']);
                    session()->set('email', $check['email']);
                    session()->set('pekerjaan', $check['pekerjaan']);
                    session()->set('aktif', $check['aktif']);
                    session()->set('tgl_lulus', $check['tgl_lulus']);
                    session()->set('kuesioner', $check['kuesioner']);
                    session()->set('ijazah', $check['ijazah']);
                    session()->set('sk_lulus', $check['sk_lulus']);
                    session()->set('transkrip_nilai', $check['transkrip_nilai']);
                    session()->set('foto_alumni', $check['foto_alumni']);
                    session()->set('password', $check['password']);
                    return redirect()->to(base_url('/home'));
                } else {
                    session()->setFlashdata('error', 'Kata sandi salah!');
                    return redirect()->to(base_url('/login'));
                }
            } else {
                if ($check['tgl_lulus'] != NULL || $check['ijazah'] != NULL || $check['sk_lulus'] != NULL || $check['transkrip_nilai'] != NULL) {
                    session()->setFlashdata('error', 'Akun Anda belum diaktifkan admin! Hubungi admin jika ada kendala!');
                    return redirect()->to(base_url('/login'));
                } else {
                    session()->set('logalumni', true);
                    session()->set('id_alumni', $check['id_alumni']);
                    session()->set('nim_alumni', $check['nim_alumni']);
                    session()->set('nama_alumni', $check['nama_alumni']);
                    session()->set('jenis_kelamin', $check['jenis_kelamin']);
                    session()->set('agama', $check['agama']);
                    session()->set('tempat_lahir', $check['tempat_lahir']);
                    session()->set('tgl_lahir', $check['tgl_lahir']);
                    session()->set('alamat_rumah', $check['alamat_rumah']);
                    session()->set('nomor_hp', $check['nomor_hp']);
                    session()->set('nomor_hp_2', $check['nomor_hp_2']);
                    session()->set('email', $check['email']);
                    session()->set('pekerjaan', $check['pekerjaan']);
                    session()->set('aktif', $check['aktif']);
                    session()->set('tgl_lulus', $check['tgl_lulus']);
                    session()->set('kuesioner', $check['kuesioner']);
                    session()->set('ijazah', $check['ijazah']);
                    session()->set('sk_lulus', $check['sk_lulus']);
                    session()->set('transkrip_nilai', $check['transkrip_nilai']);
                    session()->set('foto_alumni', $check['foto_alumni']);
                    session()->set('password', $check['password']);
                    return redirect()->to(base_url('/activation'));
                }
            }
        } else {
            session()->setFlashdata('error', 'Alumni tidak terdaftar!');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        session()->remove('logalumni');
        session()->remove('id_alumni');
        session()->remove('nim_alumni');
        session()->remove('nama_alumni');
        session()->remove('jenis_kelamin');
        session()->remove('agama');
        session()->remove('tempat_lahir');
        session()->remove('tgl_lahir');
        session()->remove('alamat_rumah');
        session()->remove('nomor_hp');
        session()->remove('nomor_hp_2');
        session()->remove('email');
        session()->remove('pekerjaan');
        session()->remove('aktif');
        session()->remove('tgl_lulus');
        session()->remove('kuesioner');
        session()->remove('ijazah');
        session()->remove('sk_lulus');
        session()->remove('transkrip_nilai');
        session()->remove('foto_alumni');
        session()->remove('password');
        session()->setFlashdata('msg', 'Terima kasih');
        return redirect()->to(base_url('/login'));
    }
}
