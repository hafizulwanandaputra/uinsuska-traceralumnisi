<?php

namespace App\Controllers;

use App\Models\AlumniAdminModel;
use App\Models\DataTables;
use App\Models\AlumniAdminDeny;
use App\Models\AlumniAdminStatus;
use App\Models\KuesionerAdminModel2;

class AlumniAdmin extends BaseController
{
    protected $AlumniAdminModel;
    protected $DataTables;
    protected $AlumniAdminDeny;
    protected $AlumniAdminStatus;
    protected $KuesionerAdminModel2;
    protected $pekerjaan;
    public function __construct()
    {
        $this->AlumniAdminModel = new AlumniAdminModel();
        $this->DataTables = new DataTables();
        $this->AlumniAdminDeny = new AlumniAdminDeny();
        $this->AlumniAdminStatus = new AlumniAdminStatus();
        $this->KuesionerAdminModel2 = new KuesionerAdminModel2();
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
        $alumni = $this->AlumniAdminModel->orderBy('id_alumni', 'DESC')->findAll();
        $unactivatedalumni = $this->AlumniAdminModel->getUnactivatedAlumni();
        $data = [
            'title' => 'Alumni',
            'alumni' => $alumni,
            'unactivatedalumni' => $unactivatedalumni
        ];
        return view('dashboard-admin/alumni/index', $data);
    }
    public function ajax()
    {
        $request = \Config\Services::request();
        $list_data = new $this->DataTables;
        $where = ['id_alumni !=' => 0];
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array('id_alumni', NULL, 'foto_alumni', 'nim_alumni', 'nama_alumni', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat_rumah', 'alamat_kantor', 'nomor_hp', 'nomor_hp_2', 'email', 'pekerjaan', 'aktif', 'tgl_lulus', 'kuesioner',  'ijazah', 'sk_lulus', 'transkrip_nilai');
        $column_search = array('nim_alumni', 'nama_alumni', 'tgl_lulus');
        $order = array('nim_alumni' => 'DESC');
        $lists = $list_data->get_datatables('alumni', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");
        foreach ($lists as $list) {
            $row = array();
            $row[] = ++$no;
            $row[] = '
			<div class="d-grid">
			<div class="btn-group" role="group">
				<a class="btn btn-info bg-gradient" style="--bs-btn-padding-y: 0.15rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 9pt;" href="' . base_url('/alumni-admin/' . $list->id_alumni) . '" role="button"><i class="fa-solid fa-circle-info"></i></a>
				<button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-' . $list->id_alumni . '" class="btn btn-danger bg-gradient" style="--bs-btn-padding-y: 0.15rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 9pt;"><i class="fa-solid fa-trash"></i></button>
			</div>
			</div>
            <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-delete-' . $list->id_alumni . '" tabindex="-1" aria-labelledby="modal-delete-' . $list->id_alumni . '" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                    <div class="modal-body p-4 text-center">
                        <h5 class="mb-0">Hapus "' . $list->nama_alumni . '"?</h5>
                    </div>
                    <form class="modal-footer flex-nowrap p-0" id="delete-' . $list->id_alumni . '" action="' . base_url('/alumni-admin/delete/' . $list->id_alumni) . '" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
			';
            if ($list->foto_alumni == NULL) {
                $row[] = '<div class="img-thumbnail rounded-pill" style="background-image: url(' . env('ALUMNI') . 'images/profile/blank.jpg' . '); background-color: #cccccc; width: 32px; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;"></div>';
            } else {
                $row[] = '<div class="img-thumbnail rounded-pill" style="background-image: url(' . env('ALUMNI') . 'images/profile/alumni/' . $list->foto_alumni . '); background-color: #cccccc; width: 32px; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;"></div>';
            };
            $row[] = '<span class="date">' . $list->nim_alumni . '</span>';
            $row[] = $list->nama_alumni;
            if ($list->jenis_kelamin == 'P') {
                $row[] = 'Perempuan';
            } else if ($list->jenis_kelamin == 'L') {
                $row[] = 'Laki-Laki';
            };
            $row[] = $list->agama;
            $row[] = $list->tempat_lahir;
            $row[] = '<span class="date">' . strftime("%e %B %Y", strtotime($list->tgl_lahir)) . '</span>';
            if ($list->alamat_rumah != NULL) {
                $row[] = $list->alamat_rumah;
            } else {
                $row[] = '-';
            };
            if ($list->nomor_hp != NULL) {
                $row[] = '<span class="date">+' . $list->nomor_hp . '</span>';
            } else {
                $row[] = '<span class="date">-</span>';
            };
            if ($list->nomor_hp_2 != NULL) {
                $row[] = '<span class="date">+' . $list->nomor_hp_2 . '</span>';
            } else {
                $row[] = '<span class="date">-</span>';
            };
            if ($list->email != NULL) {
                $row[] = $list->email;
            } else {
                $row[] = '-';
            };
            if ($list->pekerjaan != NULL) {
                $row[] = $list->pekerjaan;
            } else {
                $row[] = '-';
            };
            if ($list->aktif == 1) {
                $row[] = 'Aktif';
            } else {
                $row[] = 'Tidak Aktif';
            };
            if ($list->tgl_lulus != NULL and $list->tgl_lulus != "0000-00-00") {
                $row[] = '<span class="date">' . strftime("%e %B %Y", strtotime($list->tgl_lulus)) . '</span>';
            } else {
                $row[] = 'Belum Lulus';
            };
            if ($list->kuesioner == 1) {
                $row[] = 'Sudah Diisi';
            } else {
                $row[] = 'Belum Diisi';
            };
            $data[] = $row;
        }

        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('alumni', $where),
            "recordsFiltered" => $list_data->count_filtered('alumni', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        return json_encode($output);
    }

    public function details($id)
    {
        $alumni = $this->AlumniAdminModel->getAlumni($id);
        $title = $alumni['nama_alumni'];
        $data = [
            'title' => $title,
            'alumni' => $this->AlumniAdminModel->getAlumni($id)
        ];
        if (empty($data['alumni'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Alumni dengan ID ' . $id . ' tidak ditemukan.');
        }
        return view('dashboard-admin/alumni/details', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Alumni',
            'listpekerjaan' => $this->pekerjaan,
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard-admin/alumni/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nim_alumni' => [
                'label' => 'Nomor Induk Mahasiswa',
                'rules' => 'required|is_unique[alumni.nim_alumni]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'is_unique' => '{field} harus berbeda dengan {field} lainnya!'
                ]
            ],
            'nama_alumni' => [
                'label' => 'Nama Alumni',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
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
            ]
        ])) {
            return redirect()->to(base_url('/alumni-admin/create'))->withInput();
        }
        $password = password_hash($this->request->getVar('nim_alumni'), PASSWORD_DEFAULT);
        if ($this->request->getVar('tgl_lulus') == NULL) {
            $tgl_lulus = NULL;
        }
        $this->AlumniAdminModel->save([
            'nim_alumni' => $this->request->getVar('nim_alumni'),
            'nama_alumni' => $this->request->getVar('nama_alumni'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat_rumah' => $this->request->getVar('alamat_rumah'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'nomor_hp_2' => $this->request->getVar('nomor_hp_2'),
            'email' => $this->request->getVar('email'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'aktif' => 0,
            'tgl_lulus' => NULL,
            'kuesioner' => 0,
            'ijazah' => NULL,
            'sk_lulus' => NULL,
            'transkrip_nilai' => NULL,
            'foto_alumni' => NULL,
            'password' => $password
        ]);
        session()->setFlashdata('msg', $this->request->getVar('nama_alumni') . ' berhasil ditambahkan');
        return redirect()->to(base_url('/alumni-admin'));
    }
    public function delete($id)
    {
        $alumni = $this->AlumniAdminModel->find($id);
        if ($alumni['ijazah'] != NULL) {
            unlink(substr(FCPATH, 0, -6) . 'files/ijazah/' . $alumni['ijazah']);
        }
        if ($alumni['sk_lulus'] != NULL) {
            unlink(substr(FCPATH, 0, -6) . 'files/sk_lulus/' . $alumni['sk_lulus']);
        }
        if ($alumni['transkrip_nilai'] != NULL) {
            unlink(substr(FCPATH, 0, -6) . 'files/transkrip_nilai/' . $alumni['transkrip_nilai']);
        }
        if ($alumni['foto_alumni'] != NULL) {
            unlink(substr(FCPATH, 0, -6) . 'images/profile/alumni/' . $alumni['foto_alumni']);
        }
        if ($alumni['kuesioner'] == 1) {
            $this->KuesionerAdminModel2->delete($id);
        }
        $this->AlumniAdminModel->delete($id);
        session()->setFlashdata('msg', $alumni['nama_alumni'] . ' berhasil dihapus');
        return redirect()->to(base_url('/alumni-admin'));
    }
    public function edit($id)
    {
        $alumni = $this->AlumniAdminModel->getAlumni($id);
        $title = $alumni['nama_alumni'];
        $data = [
            'title' => 'Edit "' . $title . '"',
            'listpekerjaan' => $this->pekerjaan,
            'validation' => \Config\Services::validation(),
            'alumni' => $alumni
        ];
        return view('dashboard-admin/alumni/edit', $data);
    }
    public function update($id)
    {
        $alumni = $this->AlumniAdminModel->getAlumni($id);
        $aktif = $alumni['aktif'];
        $tgl_lulus = $alumni['tgl_lulus'];
        $kuesioner = $alumni['kuesioner'];
        $ijazah = $alumni['ijazah'];
        $sk_lulus = $alumni['sk_lulus'];
        $transkrip_nilai = $alumni['transkrip_nilai'];
        $foto_alumni = $alumni['foto_alumni'];
        $password = $alumni['password'];
        if ($alumni['nim_alumni'] == $this->request->getVar('nim_alumni')) {
            $nim_alumni = 'required';
        } else {
            $nim_alumni = 'required|is_unique[alumni.nim_alumni]';
        }
        if ($alumni['aktif'] == 1) {
            if (!$this->validate([
                'nim_alumni' => [
                    'label' => 'Nomor Induk Mahasiswa',
                    'rules' => $nim_alumni,
                    'errors' => [
                        'required' => '{field} wajib diisi!',
                        'is_unique' => '{field} harus berbeda dengan {field} lainnya!'
                    ]
                ],
                'nama_alumni' => [
                    'label' => 'Nama Alumni',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ],
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
                        'required' => '{field} wajib diisi karena akun ini aktif!'
                    ]
                ],
                'nomor_hp' => [
                    'label' => 'Nomor HP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi karena akun ini aktif!'
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi karena akun ini aktif!'
                    ]
                ],
                'pekerjaan' => [
                    'label' => 'Pekerjaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi karena akun ini aktif!'
                    ]
                ]
            ])) {
                return redirect()->to(base_url('/alumni-admin/edit/' . $id))->withInput();
            }
        } else {
            if (!$this->validate([
                'nim_alumni' => [
                    'label' => 'Nomor Induk Mahasiswa',
                    'rules' => $nim_alumni,
                    'errors' => [
                        'required' => '{field} wajib diisi!',
                        'is_unique' => '{field} harus berbeda dengan {field} lainnya!'
                    ]
                ],
                'nama_alumni' => [
                    'label' => 'Nama Alumni',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ],
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
                ]
            ])) {
                return redirect()->to(base_url('/alumni-admin/edit/' . $id))->withInput();
            }
        }
        $this->KuesionerAdminModel2->save([
            'id_alumni' => $id,
            'nim_alumni' => $this->request->getVar('nim_alumni'),
            'nama_alumni' => $this->request->getVar('nama_alumni'),
            'alamat_rumah' => $this->request->getVar('alamat_rumah'),
            'tgl_lulus' => $this->request->getVar('tgl_lulus'),
            'email' => $this->request->getVar('email')
        ]);
        $this->AlumniAdminModel->save([
            'id_alumni' => $id,
            'nim_alumni' => $this->request->getVar('nim_alumni'),
            'nama_alumni' => $this->request->getVar('nama_alumni'),
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
            'tgl_lulus' => $tgl_lulus,
            'kuesioner' => $kuesioner,
            'ijazah' => $ijazah,
            'sk_lulus' => $sk_lulus,
            'transkrip_nilai' => $transkrip_nilai,
            'foto_alumni' => $foto_alumni,
            'password' => $password
        ]);
        session()->setFlashdata('msg', 'Alumni ini berhasil diubah');
        return redirect()->to(base_url('/alumni-admin/' . $id));
    }
    public function activation()
    {
        $alumni = $this->AlumniAdminModel->where('aktif', 0)->where('ijazah !=', NULL)->where('transkrip_nilai !=', NULL)->orderBy('id_alumni', 'DESC')->findAll();
        $unactivatedalumni = $this->AlumniAdminModel->getUnactivatedAlumni();
        $data = [
            'title' => 'Aktivasi Alumni (' . $unactivatedalumni . ')',
            'alumni' => $alumni,
            'unactivatedalumni' => $unactivatedalumni
        ];
        return view('dashboard-admin/alumni/activation', $data);
    }
    public function activate($id)
    {
        $alumni = $this->AlumniAdminStatus->getAlumni($id);
        $nim_alumni = $alumni['nim_alumni'];
        $nama_alumni = $alumni['nama_alumni'];
        $password = $alumni['password'];
        $this->AlumniAdminStatus->save([
            'id_alumni' => $id,
            'nim_alumni' => $nim_alumni,
            'nama_alumni' => $nama_alumni,
            'aktif' => 1,
            'password' => $password,
        ]);
        session()->setFlashdata('msg', $nama_alumni . ' (' . $nim_alumni . ') berhasil diaktifkan');
        return redirect()->to(base_url('/alumni-admin/activation'));
    }
    public function deny($id)
    {
        $alumni = $this->AlumniAdminDeny->getAlumni($id);
        unlink(substr(FCPATH, 0, -6) . 'files/ijazah/' . $alumni['ijazah']);
        unlink(substr(FCPATH, 0, -6) . 'files/sk_lulus/' . $alumni['sk_lulus']);
        unlink(substr(FCPATH, 0, -6) . 'files/transkrip_nilai/' . $alumni['transkrip_nilai']);
        $nim_alumni = $alumni['nim_alumni'];
        $nama_alumni = $alumni['nama_alumni'];
        $this->AlumniAdminDeny->save([
            'id_alumni' => $id,
            'nim_alumni' => $nim_alumni,
            'nama_alumni' => $nama_alumni,
            'tgl_lulus' => NULL,
            'ijazah' => NULL,
            'sk_lulus' => NULL,
            'transkrip_nilai' => NULL,
        ]);
        session()->setFlashdata('msg', $nama_alumni . ' (' . $nim_alumni . ') berhasil ditolak aktivasinya');
        return redirect()->to(base_url('/alumni-admin/activation'));
    }
    public function resetpassword($id)
    {
        $alumni = $this->AlumniAdminStatus->getAlumni($id);
        $nim_alumni = $alumni['nim_alumni'];
        $nama_alumni = $alumni['nama_alumni'];
        $aktif = $alumni['aktif'];
        $password = password_hash($nim_alumni, PASSWORD_DEFAULT);
        $this->AlumniAdminStatus->save([
            'id_alumni' => $id,
            'nim_alumni' => $nim_alumni,
            'nama_alumni' => $nama_alumni,
            'aktif' => $aktif,
            'password' => $password
        ]);
        session()->setFlashdata('msg', 'Alumni ini berhasil direset kata sandinya');
        return redirect()->to(base_url('/alumni-admin/' . $id));
    }
}
