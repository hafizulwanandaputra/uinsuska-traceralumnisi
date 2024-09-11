<?php

namespace App\Controllers;

use App\Models\KuesionerModel;

class Kuesioner extends BaseController
{
    protected $KuesionerModel;
    public function __construct()
    {
        $this->KuesionerModel = new KuesionerModel();
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }

    public function index()
    {
        if (session()->get('tgl_lulus') != NULL || session()->get('ijazah') != NULL || session()->get('sk_lulus') != NULL || session()->get('transkrip_nilai') != NULL) {
            $id = session()->get('id_alumni');
            $kuesioner = $this->KuesionerModel->where('id_alumni', $id)->findAll();
            $data = [
                'title' => 'Kuesioner',
                'kuesioner' => $kuesioner
            ];
            return view('dashboard/kuesioner/index', $data);
        } else {
            return redirect()->to(base_url('/activation'));
        }
    }

    public function create()
    {
        if (session()->get('tgl_lulus') != NULL || session()->get('ijazah') != NULL || session()->get('sk_lulus') != NULL || session()->get('transkrip_nilai') != NULL) {
            $id = session()->get('id_alumni');
            $kuesioner = $this->KuesionerModel->where('id_alumni', $id)->findAll();
            if (!empty($kuesioner)) {
                return redirect()->to(base_url('/kuesioner/edit'));
            } else {
                $data = [
                    'title' => 'Isi Kuesioner',
                ];
                return view('dashboard/kuesioner/create', $data);
            }
        } else {
            return redirect()->to(base_url('/activation'));
        }
    }

    public function save()
    {
        if ($this->request->getVar('bekerja') == 1) {
            if (!$this->validate([
                'nomor_hp' => [
                    'label' => 'Nomor HP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib dipilih!'
                    ]
                ],
                'ipk' => [
                    'label' => 'IPK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ],
                'thn_masuk' => [
                    'label' => 'Tahun Masuk',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} wajib diisi!',
                        'numeric' => '{field} harus berupa angka!'
                    ]
                ],
                'bekerja' => [
                    'label' => 'Bekerja',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Anda harus memilih apakah Anda bekerja atau tidak!'
                    ]
                ],
                'jenis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'nama_kantor' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'nama_pimpinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'email_pimpinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'bidang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'thn_mulai_kerja' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!',
                        'numeric' => 'Bagian ini harus berupa angka!'
                    ]
                ],
                'alamat_kantor' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'penghasilan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'sesuai_ilmu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'dapat_kerja' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'tingkat_pendidikan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'kerja_stlh_lulus' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'tempat_tinggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'uang_kuliah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'anggota_org' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'ikut_kursus' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
            ])) {
                return redirect()->to(base_url('/kuesioner/create'))->withInput();
            }
        } else {
            if (!$this->validate([
                'nomor_hp' => [
                    'label' => 'Nomor HP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib dipilih!'
                    ]
                ],
                'ipk' => [
                    'label' => 'IPK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ],
                'thn_masuk' => [
                    'label' => 'Tahun Masuk',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} wajib diisi!',
                        'numeric' => '{field} harus berupa angka!'
                    ]
                ],
                'bekerja' => [
                    'label' => 'Bekerja',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Anda harus memilih apakah Anda bekerja atau tidak!'
                    ]
                ],
                'tempat_tinggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'uang_kuliah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'anggota_org' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'ikut_kursus' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
            ])) {
                return redirect()->to(base_url('/kuesioner/create'))->withInput();
            }
        }
        $id_alumni = session()->get('id_alumni');
        $nama_alumni = session()->get('nama_alumni');
        $nim_alumni = session()->get('nim_alumni');
        $alamat_rumah = session()->get('alamat_rumah');
        $tgl_lulus = session()->get('tgl_lulus');
        $email = session()->get('email');
        if ($this->request->getVar('bekerja') == 1) {
            $this->KuesionerModel->save([
                'id_alumni' => $id_alumni,
                'nama_alumni' => $nama_alumni,
                'nim_alumni' => $nim_alumni,
                'alamat_rumah' => $alamat_rumah,
                'tgl_lulus' => $tgl_lulus,
                'ipk' => $this->request->getVar('ipk'),
                'nomor_hp' => $this->request->getVar('nomor_hp'),
                'email' => $email,
                'thn_masuk' => $this->request->getVar('thn_masuk'),
                'bekerja' => $this->request->getVar('bekerja'),
                'jenis' => $this->request->getVar('jenis'),
                'nama_kantor' => $this->request->getVar('nama_kantor'),
                'nama_pimpinan' => $this->request->getVar('nama_pimpinan'),
                'email_pimpinan' => $this->request->getVar('email_pimpinan'),
                'bidang' => $this->request->getVar('bidang'),
                'thn_mulai_kerja' => $this->request->getVar('thn_mulai_kerja'),
                'no_telp_pimpinan' => $this->request->getVar('no_telp_pimpinan'),
                'website_kantor' => $this->request->getVar('website_kantor'),
                'alamat_kantor' => $this->request->getVar('alamat_kantor'),
                'penghasilan' => $this->request->getVar('penghasilan'),
                'status' => $this->request->getVar('status'),
                'sesuai_ilmu' => $this->request->getVar('sesuai_ilmu'),
                'dapat_kerja' => $this->request->getVar('dapat_kerja'),
                'tingkat_pendidikan' => $this->request->getVar('tingkat_pendidikan'),
                'kerja_stlh_lulus' => $this->request->getVar('kerja_stlh_lulus'),
                'tempat_tinggal' => $this->request->getVar('tempat_tinggal'),
                'uang_kuliah' => $this->request->getVar('uang_kuliah'),
                'anggota_org' => $this->request->getVar('anggota_org'),
                'aktif_org' => $this->request->getVar('aktif_org'),
                'ikut_kursus' => $this->request->getVar('ikut_kursus'),
                'kursus' => $this->request->getVar('kursus'),
                'saran' => $this->request->getVar('saran'),
            ]);
        } else {
            $this->KuesionerModel->save([
                'id_alumni' => $id_alumni,
                'nama_alumni' => $nama_alumni,
                'nim_alumni' => $nim_alumni,
                'alamat_rumah' => $alamat_rumah,
                'tgl_lulus' => $tgl_lulus,
                'ipk' => $this->request->getVar('ipk'),
                'nomor_hp' => $this->request->getVar('nomor_hp'),
                'email' => $email,
                'thn_masuk' => $this->request->getVar('thn_masuk'),
                'bekerja' => $this->request->getVar('bekerja'),
                'jenis' => NULL,
                'nama_kantor' => NULL,
                'nama_pimpinan' => NULL,
                'email_pimpinan' => NULL,
                'bidang' => NULL,
                'thn_mulai_kerja' => NULL,
                'no_telp_pimpinan' => NULL,
                'website_kantor' => NULL,
                'alamat_kantor' => NULL,
                'penghasilan' => NULL,
                'status' => NULL,
                'sesuai_ilmu' => NULL,
                'dapat_kerja' => NULL,
                'tingkat_pendidikan' => NULL,
                'kerja_stlh_lulus' => NULL,
                'tempat_tinggal' => $this->request->getVar('tempat_tinggal'),
                'uang_kuliah' => $this->request->getVar('uang_kuliah'),
                'anggota_org' => $this->request->getVar('anggota_org'),
                'aktif_org' => $this->request->getVar('aktif_org'),
                'ikut_kursus' => $this->request->getVar('ikut_kursus'),
                'kursus' => $this->request->getVar('kursus'),
                'saran' => $this->request->getVar('saran'),
            ]);
        }
        $db = \Config\Database::connect();
        $alumni = $db->table('alumni');
        $alumni->set('kuesioner', 1);
        $alumni->where('id_alumni', session()->get('id_alumni'));
        $alumni->update();
        session()->remove('kuesioner');
        session()->set('kuesioner', 1);
        session()->setFlashdata('msg', 'Kuesioner Anda berhasil diisi');
        return redirect()->to(base_url('/kuesioner'));
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $alumni = $db->table('alumni');
        $alumni->set('kuesioner', 0);
        $alumni->where('id_alumni', session()->get('id_alumni'));
        $alumni->update();
        $this->KuesionerModel->delete($id);
        session()->remove('kuesioner');
        session()->set('kuesioner', 0);
        session()->setFlashdata('msg', 'Kuesioner Anda berhasil dihapus');
        return redirect()->to(base_url('/kuesioner'));
    }

    public function edit()
    {
        if (session()->get('tgl_lulus') != NULL || session()->get('ijazah') != NULL || session()->get('sk_lulus') != NULL || session()->get('transkrip_nilai') != NULL) {
            $id = session()->get('id_alumni');
            $editkuesioner = $this->KuesionerModel->where('id_alumni', $id)->findAll();;
            if (empty($editkuesioner)) {
                return redirect()->to(base_url('/kuesioner/create'));
            } else {
                $data = [
                    'title' => 'Isi Kuesioner',
                    'editkuesioner' => $editkuesioner
                ];
                return view('dashboard/kuesioner/edit', $data);
            }
        } else {
            return redirect()->to(base_url('/activation'));
        }
    }

    public function update($id)
    {
        $this->KuesionerModel->getKuesioner($id);
        $id_alumni = session()->get('id_alumni');
        $nama_alumni = session()->get('nama_alumni');
        $nim_alumni = session()->get('nim_alumni');
        $alamat_rumah = session()->get('alamat_rumah');
        $tgl_lulus = session()->get('tgl_lulus');
        $email = session()->get('email');
        if ($this->request->getVar('bekerja') == 1) {
            if (!$this->validate([
                'nomor_hp' => [
                    'label' => 'Nomor HP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib dipilih!'
                    ]
                ],
                'ipk' => [
                    'label' => 'IPK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ],
                'thn_masuk' => [
                    'label' => 'Tahun Masuk',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} wajib diisi!',
                        'numeric' => '{field} harus berupa angka!'
                    ]
                ],
                'bekerja' => [
                    'label' => 'Bekerja',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Anda harus memilih apakah Anda bekerja atau tidak!'
                    ]
                ],
                'jenis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'nama_kantor' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'nama_pimpinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'email_pimpinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'bidang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'thn_mulai_kerja' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!',
                        'numeric' => 'Bagian ini harus berupa angka!'
                    ]
                ],
                'alamat_kantor' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib diisi!'
                    ]
                ],
                'penghasilan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'sesuai_ilmu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'dapat_kerja' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'tingkat_pendidikan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'kerja_stlh_lulus' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'tempat_tinggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'uang_kuliah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'anggota_org' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'ikut_kursus' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
            ])) {
                return redirect()->to(base_url('/kuesioner/edit'))->withInput();
            }
        } else {
            if (!$this->validate([
                'nomor_hp' => [
                    'label' => 'Nomor HP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib dipilih!'
                    ]
                ],
                'ipk' => [
                    'label' => 'IPK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ],
                'thn_masuk' => [
                    'label' => 'Tahun Masuk',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} wajib diisi!',
                        'numeric' => '{field} harus berupa angka!'
                    ]
                ],
                'bekerja' => [
                    'label' => 'Bekerja',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Anda harus memilih apakah Anda bekerja atau tidak!'
                    ]
                ],
                'tempat_tinggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'uang_kuliah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'anggota_org' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
                'ikut_kursus' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bagian ini wajib dipilih!'
                    ]
                ],
            ])) {
                return redirect()->to(base_url('/kuesioner/edit'))->withInput();
            }
        }
        if ($this->request->getVar('bekerja') == 1) {
            $this->KuesionerModel->save([
                'id_kuesioner' => $id,
                'id_alumni' => $id_alumni,
                'nama_alumni' => $nama_alumni,
                'nim_alumni' => $nim_alumni,
                'alamat_rumah' => $alamat_rumah,
                'tgl_lulus' => $tgl_lulus,
                'ipk' => $this->request->getVar('ipk'),
                'nomor_hp' => $this->request->getVar('nomor_hp'),
                'email' => $email,
                'thn_masuk' => $this->request->getVar('thn_masuk'),
                'bekerja' => $this->request->getVar('bekerja'),
                'jenis' => $this->request->getVar('jenis'),
                'nama_kantor' => $this->request->getVar('nama_kantor'),
                'nama_pimpinan' => $this->request->getVar('nama_pimpinan'),
                'email_pimpinan' => $this->request->getVar('email_pimpinan'),
                'bidang' => $this->request->getVar('bidang'),
                'thn_mulai_kerja' => $this->request->getVar('thn_mulai_kerja'),
                'no_telp_pimpinan' => $this->request->getVar('no_telp_pimpinan'),
                'website_kantor' => $this->request->getVar('website_kantor'),
                'alamat_kantor' => $this->request->getVar('alamat_kantor'),
                'penghasilan' => $this->request->getVar('penghasilan'),
                'status' => $this->request->getVar('status'),
                'sesuai_ilmu' => $this->request->getVar('sesuai_ilmu'),
                'dapat_kerja' => $this->request->getVar('dapat_kerja'),
                'tingkat_pendidikan' => $this->request->getVar('tingkat_pendidikan'),
                'kerja_stlh_lulus' => $this->request->getVar('kerja_stlh_lulus'),
                'tempat_tinggal' => $this->request->getVar('tempat_tinggal'),
                'uang_kuliah' => $this->request->getVar('uang_kuliah'),
                'anggota_org' => $this->request->getVar('anggota_org'),
                'aktif_org' => $this->request->getVar('aktif_org'),
                'ikut_kursus' => $this->request->getVar('ikut_kursus'),
                'kursus' => $this->request->getVar('kursus'),
                'saran' => $this->request->getVar('saran'),
            ]);
        } else {
            $this->KuesionerModel->save([
                'id_kuesioner' => $id,
                'id_alumni' => $id_alumni,
                'nama_alumni' => $nama_alumni,
                'nim_alumni' => $nim_alumni,
                'alamat_rumah' => $alamat_rumah,
                'tgl_lulus' => $tgl_lulus,
                'ipk' => $this->request->getVar('ipk'),
                'nomor_hp' => $this->request->getVar('nomor_hp'),
                'email' => $email,
                'thn_masuk' => $this->request->getVar('thn_masuk'),
                'bekerja' => $this->request->getVar('bekerja'),
                'jenis' => NULL,
                'nama_kantor' => NULL,
                'nama_pimpinan' => NULL,
                'email_pimpinan' => NULL,
                'bidang' => NULL,
                'thn_mulai_kerja' => NULL,
                'no_telp_pimpinan' => NULL,
                'website_kantor' => NULL,
                'alamat_kantor' => NULL,
                'penghasilan' => NULL,
                'status' => NULL,
                'sesuai_ilmu' => NULL,
                'dapat_kerja' => NULL,
                'tingkat_pendidikan' => NULL,
                'kerja_stlh_lulus' => NULL,
                'tempat_tinggal' => $this->request->getVar('tempat_tinggal'),
                'uang_kuliah' => $this->request->getVar('uang_kuliah'),
                'anggota_org' => $this->request->getVar('anggota_org'),
                'aktif_org' => $this->request->getVar('aktif_org'),
                'ikut_kursus' => $this->request->getVar('ikut_kursus'),
                'kursus' => $this->request->getVar('kursus'),
                'saran' => $this->request->getVar('saran'),
            ]);
        }
        session()->setFlashdata('msg', 'Kuesioner Anda berhasil diedit');
        return redirect()->to(base_url('/kuesioner'));
    }
}
