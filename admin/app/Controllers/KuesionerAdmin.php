<?php

namespace App\Controllers;

use App\Models\AlumniAdminModel;
use App\Models\KuesionerAdminModel;
use App\Models\DataTables;

class KuesionerAdmin extends BaseController
{
    protected $AlumniAdminModel;
    protected $KuesionerAdminModel;
    protected $DataTables;
    public function __construct()
    {
        $this->AlumniAdminModel = new AlumniAdminModel();
        $this->KuesionerAdminModel = new KuesionerAdminModel();
        $this->DataTables = new DataTables();
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }

    public function index()
    {
        $kuesioner = $this->KuesionerAdminModel->orderBy('id_alumni', 'DESC')->findAll();
        $blmisikuesioner = $this->AlumniAdminModel->getBelumIsiKuesioner();
        $data = [
            'title' => 'Kuesioner',
            'kuesioner' => $kuesioner,
            'blmisikuesioner' => $blmisikuesioner
        ];
        return view('dashboard-admin/kuesioner/index', $data);
    }
    public function ajax()
    {
        $request = \Config\Services::request();
        $list_data = new $this->DataTables;
        $where = ['id_kuesioner !=' => 0];
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array('id_alumni', NULL, 'nama_alumni', 'nim_alumni', 'nomor_hp', 'email', 'tgl_isi', 'tgl_ubah');
        $column_search = array('nama_alumni', 'nim_alumni');
        $order = array('id_kuesioner' => 'DESC');
        $lists = $list_data->get_datatables('kuesioner', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");
        foreach ($lists as $list) {
            $row = array();
            $row[] = ++$no;
            $row[] = '
			<div class="d-grid">
			<div class="btn-group" role="group">
				<a class="btn btn-info bg-gradient" style="--bs-btn-padding-y: 0.15rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 9pt;" href="' . base_url('/kuesioner-admin/' . $list->id_kuesioner) . '" role="button"><i class="fa-solid fa-circle-info"></i></a>
				<button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-' . $list->id_kuesioner . '" class="btn btn-danger bg-gradient" style="--bs-btn-padding-y: 0.15rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 9pt;"><i class="fa-solid fa-trash"></i></button>
			</div>
			</div>
            <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-delete-' . $list->id_kuesioner . '" tabindex="-1" aria-labelledby="modal-delete-' . $list->id_kuesioner . '" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                    <div class="modal-body p-4 text-center">
                        <h5 class="mb-0">Hapus Kuesioner dari "' . $list->nama_alumni . '"?</h5>
                    </div>
                    <form class="modal-footer flex-nowrap p-0" id="delete-' . $list->id_kuesioner . '" action="' . base_url('/kuesioner-admin/delete/' . $list->id_kuesioner) . '" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
			';
            $row[] = $list->nama_alumni;
            $row[] = '<span class="date">' . $list->nim_alumni . '</span>';
            if ($list->nomor_hp != NULL) {
                $row[] = '<span class="date">+' . $list->nomor_hp . '</span>';
            } else {
                $row[] = '<span class="date">-</span>';
            };
            $row[] = $list->email;
            $row[] = '<span class="date">' . strftime("%e %B %Y, %H.%M.%S", strtotime($list->tgl_isi)) . '</span>';
            $row[] = '<span class="date">' . strftime("%e %B %Y, %H.%M.%S", strtotime($list->tgl_ubah)) . '</span>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('kuesioner', $where),
            "recordsFiltered" => $list_data->count_filtered('kuesioner', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        return json_encode($output);
    }

    public function belumisi()
    {
        $data = [
            'title' => 'Yang Belum Isi Kuesioner'
        ];
        return view('dashboard-admin/kuesioner/belumisi', $data);
    }
    public function databelumisi()
    {
        $request = \Config\Services::request();
        $list_data = new $this->DataTables;
        $where = ['kuesioner' => 0, 'aktif' => 1];
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array('id_alumni', NULL, 'nama_alumni', 'nim_alumni', 'nomor_hp', 'nomor_hp_2', 'email');
        $column_search = array('nama_alumni', 'nim_alumni');
        $order = array('id_alumni' => 'DESC');
        $lists = $list_data->get_datatables('alumni', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");
        foreach ($lists as $list) {
            $row = array();
            $row[] = ++$no;
            if ($list->nomor_hp_2 == NULL) {
                $row[] = '
                <div class="d-grid">
                <div class="btn-group" role="group">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-notify-' . $list->id_alumni . '" class="btn btn-info bg-gradient" style="--bs-btn-padding-y: 0.15rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 9pt;"><i class="fa-solid fa-bell"></i></button>
                </div>
                </div>
                <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-notify-' . $list->id_alumni . '" tabindex="-1" aria-labelledby="modal-notify-' . $list->id_alumni . '" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                        <div class="modal-body p-5">
                            <h2 class="fw-bold">' . $list->nama_alumni . ' belum mengisi kuesioner!</h2>
                            <h5 class="mb-0">Hubungi salah satu nomor berikut!</h5>
                            <a href="https://wa.me/' . $list->nomor_hp . '" role="button" class="btn btn-lg btn-success bg-gradient mt-3 w-100" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp 1</a>
                            <a href="mailto:' . $list->email . '" role="button" class="btn btn-lg btn-secondary bg-gradient mt-3 w-100" target="_blank"><i class="fa-solid fa-envelope"></i> Email</a>
                        </div>
                    </div>
                </div>
            </div>
                ';
            } else {
                $row[] = '
                <div class="d-grid">
                <div class="btn-group" role="group">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-notify-' . $list->id_alumni . '" class="btn btn-info bg-gradient" style="--bs-btn-padding-y: 0.15rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 9pt;"><i class="fa-solid fa-bell"></i></button>
                </div>
                </div>
                <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-notify-' . $list->id_alumni . '" tabindex="-1" aria-labelledby="modal-notify-' . $list->id_alumni . '" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                        <div class="modal-body p-5">
                            <h2 class="fw-bold">' . $list->nama_alumni . ' belum mengisi kuesioner!</h2>
                            <h5 class="mb-0">Hubungi salah satu nomor berikut!</h5>
                            <a href="https://wa.me/' . $list->nomor_hp . '" role="button" class="btn btn-lg btn-success bg-gradient mt-3 w-100" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp 1</a>
                            <a href="https://wa.me/' . $list->nomor_hp_2 . '" role="button" class="btn btn-lg btn-success bg-gradient mt-3 w-100" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp 2</a>
                            <a href="mailto:' . $list->email . '" role="button" class="btn btn-lg btn-secondary bg-gradient mt-3 w-100" target="_blank"><i class="fa-solid fa-envelope"></i> Email</a>
                        </div>
                    </div>
                </div>
            </div>
                ';
            }
            $row[] = $list->nama_alumni;
            $row[] = '<span class="date">' . $list->nim_alumni . '</span>';
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
            $row[] = $list->email;
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
        $kuesioner = $this->KuesionerAdminModel->getKuesioner($id);
        $title = $kuesioner['nama_alumni'];
        $data = [
            'title' => $title,
            'kuesioner' => $this->KuesionerAdminModel->getKuesioner($id)
        ];
        if (empty($data['kuesioner'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kuesioner dengan ID ' . $id . ' tidak ditemukan.');
        }
        return view('dashboard-admin/kuesioner/details', $data);
    }

    public function delete($id)
    {
        $kuesioner = $this->KuesionerAdminModel->find($id);
        $id_alumni = $kuesioner['id_alumni'];
        $db = \Config\Database::connect();
        $alumni = $db->table('alumni');
        $alumni->set('kuesioner', 0);
        $alumni->where('id_alumni', $id_alumni);
        $alumni->update();
        $this->KuesionerAdminModel->delete($id);
        session()->setFlashdata('msg', 'Kuesioner' . $kuesioner['nama_alumni'] . ' berhasil dihapus');
        return redirect()->to(base_url('/kuesioner-admin'));
    }
}
