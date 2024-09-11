<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use App\Models\KuesionerModelProfil;
use App\Models\DelProfilModel;

class Profil extends BaseController
{
    protected $ProfilModel;
    protected $KuesionerModelProfil;
    protected $DelProfilModel;
    protected $pekerjaan;
    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->KuesionerModelProfil = new KuesionerModelProfil();
        $this->DelProfilModel = new DelProfilModel();
        setlocale(LC_ALL, 'id-ID', 'id_ID');
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
        if (session()->get('tgl_lulus') != NULL || session()->get('ijazah') != NULL || session()->get('sk_lulus') != NULL || session()->get('transkrip_nilai') != NULL) {
            $data = [
                'title' => 'Profil Anda',
            ];
            return view('dashboard/profil/index', $data);
        } else {
            return redirect()->to(base_url('/activation'));
        }
    }

    public function edit()
    {
        if (session()->get('tgl_lulus') != NULL || session()->get('ijazah') != NULL || session()->get('sk_lulus') != NULL || session()->get('transkrip_nilai') != NULL) {
            $data = [
                'title' => 'Edit Profil Anda',
                'listpekerjaan' => $this->pekerjaan,
                'validation' => \Config\Services::validation()
            ];
            echo view('dashboard/profil/edit', $data);
        } else {
            return redirect()->to(base_url('/activation'));
        }
    }
    public function update()
    {
        if (session()->get('nim_alumni') == $this->request->getVar('nim_alumni')) {
            $nim_alumni = 'required';
        } else {
            $nim_alumni = 'required|is_unique[alumni.nim_alumni]';
        }
        if (!$this->validate([
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'agama' => [
                'label' => 'Agama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
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
                'label' => 'Nomor HP 1',
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
            'tgl_lulus' => [
                'label' => 'Tanggal Lulus',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'foto_alumni' => [
                'label' => 'Foto Profil',
                'rules' => 'max_size[foto_alumni,2048]|is_image[foto_alumni]|mime_in[foto_alumni,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => '{field} harus kurang dari 2 MB!',
                    'is_image' => '{field} harus berupa file gambar!',
                    'mime_in' => '{field} harus file gambar yang valid!',
                ]
            ],
            'ijazah' => [
                'label' => 'Ijazah',
                'rules' => 'max_size[ijazah,2048]|ext_in[ijazah,pdf]|mime_in[ijazah,application/pdf]',
                'errors' => [
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
                'label' => 'Transkrip Nilai Akhir',
                'rules' => 'max_size[transkrip_nilai,2048]|ext_in[transkrip_nilai,pdf]|mime_in[transkrip_nilai,application/pdf]',
                'errors' => [
                    'max_size' => '{field} harus kurang dari 2MB!',
                    'ext_in' => 'ekstensi file untuk {field} harus PDF!',
                    'mime_in' => 'File untuk {field} bukan PDF yang valid!'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/profil/edit'))->withInput();
        }
        $fileFotoAlumni = $this->request->getFile('foto_alumni');
        $fileIjazah = $this->request->getFile('ijazah');
        $fileSKL = $this->request->getFile('sk_lulus');
        $fileTranskripNilai = $this->request->getFile('transkrip_nilai');
        $id_alumni = session()->get('id_alumni');
        $aktif = session()->get('aktif');
        $kuesioner = session()->get('kuesioner');
        $password = session()->get('password');
        // FOTO ALUMNI
        if ($fileFotoAlumni->getError() == 4) {
            $foto_alumni = $this->request->getVar('foto_alumni_lama');
        } else {
            $foto_alumni = $fileFotoAlumni->getRandomName();
            $fileFotoAlumni->move(FCPATH . 'images/profile/alumni/', $foto_alumni);
            if ($this->request->getVar('foto_alumni_lama') != NULL) {
                unlink(FCPATH . 'images/profile/alumni/' . $this->request->getVar('foto_alumni_lama'));
            }
        }
        // IJAZAH
        if ($fileIjazah->getError() == 4) {
            $ijazah = $this->request->getVar('ijazah_lama');
        } else {
            $ijazah = $fileIjazah->getRandomName();
            $fileIjazah->move(FCPATH . 'files/ijazah/', $ijazah);
            if ($this->request->getVar('ijazah_lama') != NULL) {
                unlink(FCPATH . 'files/ijazah/' . $this->request->getVar('ijazah_lama'));
            }
        }
        // SURAT KETERANGAN LULUS
        if ($fileSKL->getError() == 4) {
            $sk_lulus = $this->request->getVar('sk_lulus_lama');
        } else {
            $sk_lulus = $fileSKL->getRandomName();
            $fileSKL->move(FCPATH . 'files/sk_lulus/', $sk_lulus);
            if ($this->request->getVar('sk_lulus_lama') != NULL) {
                unlink(FCPATH . 'files/sk_lulus/' . $this->request->getVar('sk_lulus_lama'));
            }
        }
        // TRANSKRIP NILAI AKHIR
        if ($fileTranskripNilai->getError() == 4) {
            $transkrip_nilai = $this->request->getVar('transkrip_nilai_lama');
        } else {
            $transkrip_nilai = $fileTranskripNilai->getRandomName();
            $fileTranskripNilai->move(FCPATH . 'files/transkrip_nilai/', $transkrip_nilai);
            if ($this->request->getVar('transkrip_nilai_lama') != NULL) {
                unlink(FCPATH . 'files/transkrip_nilai/' . $this->request->getVar('transkrip_nilai_lama'));
            }
        }
        $this->KuesionerModelProfil->save([
            'id_alumni' => $id_alumni,
            'nim_alumni' => session()->get('nim_alumni'),
            'nama_alumni' => session()->get('nama_alumni'),
            'alamat_rumah' => $this->request->getVar('alamat_rumah'),
            'tgl_lulus' => $this->request->getVar('tgl_lulus'),
            'email' => $this->request->getVar('email')
        ]);
        $this->ProfilModel->save([
            'id_alumni' => $id_alumni,
            'nim_alumni' => session()->get('nim_alumni'),
            'nama_alumni' => session()->get('nama_alumni'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat_rumah' => $this->request->getVar('alamat_rumah'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'nomor_hp_2' => $this->request->getVar('nomor_hp_2'),
            'email' => $this->request->getVar('email'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'aktif' => $aktif,
            'tgl_lulus' => $this->request->getVar('tgl_lulus'),
            'kuesioner' => $kuesioner,
            'ijazah' => $ijazah,
            'sk_lulus' => $sk_lulus,
            'transkrip_nilai' => $transkrip_nilai,
            'foto_alumni' => $foto_alumni,
            'password' => $password
        ]);
        session()->remove('jenis_kelamin');
        session()->remove('agama');
        session()->remove('tempat_lahir');
        session()->remove('tgl_lahir');
        session()->remove('alamat_rumah');
        session()->remove('alamat_kantor');
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
        session()->set('jenis_kelamin', $this->request->getVar('jenis_kelamin'));
        session()->set('agama', $this->request->getVar('agama'));
        session()->set('tempat_lahir', $this->request->getVar('tempat_lahir'));
        session()->set('tgl_lahir', $this->request->getVar('tgl_lahir'));
        session()->set('alamat_rumah', $this->request->getVar('alamat_rumah'));
        session()->set('alamat_kantor', $this->request->getVar('alamat_kantor'));
        session()->set('nomor_hp', $this->request->getVar('nomor_hp'));
        session()->set('nomor_hp_2', $this->request->getVar('nomor_hp_2'));
        session()->set('email', $this->request->getVar('email'));
        session()->set('pekerjaan', $this->request->getVar('pekerjaan'));
        session()->set('aktif', $aktif);
        session()->set('tgl_lulus', $this->request->getVar('tgl_lulus'));
        session()->set('kuesioner', $kuesioner);
        session()->set('ijazah', $ijazah);
        session()->set('sk_lulus', $sk_lulus);
        session()->set('transkrip_nilai', $transkrip_nilai);
        session()->set('foto_alumni', $foto_alumni);
        session()->set('password', $password);
        session()->setFlashdata('msg', 'Profil Anda berhasil diubah');
        return redirect()->to(base_url('/profil'));
    }
    public function delprofilephoto()
    {
        unlink(FCPATH . 'images/profile/alumni/' . session()->get('foto_alumni'));
        $this->DelProfilModel->save([
            'id_alumni' => session()->get('id_alumni'),
            'foto_alumni' => NULL
        ]);
        session()->remove('foto_alumni');
        session()->set('foto_alumni', NULL);
        session()->setFlashdata('msg', 'Foto profil Anda berhasil diubah');
        return redirect()->to(base_url('/profil'));
    }
}
