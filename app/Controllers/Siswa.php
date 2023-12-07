<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDataSiswa;
use App\Models\ModelSiswa;
use Config\Services;

class Siswa extends BaseController
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('siswa');
    }
    public function index()
    {
        $data['title'] = 'List Siswa | Fathanalii';
        return view('siswa/v_siswa', $data);
    }

    public function listData()
    {

        $request    = Services::request();
        $datatable  = new ModelDataSiswa($request);

        if ($request->getMethod(true) === 'POST') {
            $lists  = $datatable->getDatatables();
            $data   = [];
            $no     = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tombolview = '<button type="button" class="btn btn-sm btn-outline-success" id="tombolview_' . $list->id . '" title="View Data"  onclick="view(\'' . $list->id . '\')">
                <i class="fa fa-eye"></i>
                </button>';

                $tomboledit = '<button type="button" class="btn btn-sm btn-outline-primary" id="tomboledit_' . $list->id . '" title="Edit Data"  onclick="edit(\'' . $list->id . '\')">
                <i class="fa fa-edit"></i>
                </button>';

                $tombolhapus = "<button type=\"button\" class=\"btn btn-sm btn-outline-danger\"  onclick=\"hapus('" . $list->id . "')\">
                <i class=\"fa fa-trash-alt \"></i>
                </button>";


                $row[]  = $no;
                $row[]  = $list->nipd;
                $row[]  = $list->nama_siswa;
                $row[]  = $tombolview . '  ' . $tomboledit . '  ' . $tombolhapus;
                $data[] = $row;
            }

            $output = [
                'draw'            => $request->getPost('draw'),
                'recordsTotal'    => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data'            => $data
            ];

            echo json_encode($output);
        }
    }

    public function formtambah()
    {
        return view('siswa/modaltambah');
    }

    public function save()
    {
        $nipdsiswa     = $this->request->getVar('nipdsiswa');
        $namasiswa     = $this->request->getVar('namasiswa');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'nipdsiswa'     => [
                'rules'     => 'required',
                'label'     => 'NIPD',
                'errors'    => [
                    'required'  => '{field} tidak boleh kosong',
                ]
            ],
            'namasiswa'        => [
                'rules'     => 'required',
                'label'     => 'Nama Siswa',
                'errors'    => [
                    'required'  => '{field} tidak boleh kosong',
                ]
            ],
        ]);

        if (!$valid) {
            $error = [
                'nipdsiswa'      => $validation->getError('nipdsiswa'),
                'namasiswa'      => $validation->getError('namasiswa'),

            ];

            $json =  [
                'error'  => $error
            ];
        } else {
            $model = new ModelSiswa();
            $model->insert([
                'nipd'          => $nipdsiswa,
                'nama_siswa'    => $namasiswa,
            ]);
            $json = [
                'sukses' => 'Data berhasi disimpan...'
            ];
        }
        echo json_encode($json);
    }
    public function formedit()
    {
        if ($this->request->isAJAX()) {

            $id         = $this->request->getPost('id');
            $model      = new ModelSiswa();
            $row        = $model->find($id);

            if ($row) {
                $data = [
                    'nipdsiswa'     => $row['nipd'],
                    'namasiswa'     => $row['nama_siswa'],
                ];
                echo view('siswa/modaledit', $data);
            }
        }
    }
     function update()
    {
        $nipdsiswa      = $this->request->getVar('nipdsiswa');
        $namasiswa      = $this->request->getVar('namasiswa');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'nipdsiswa'     => [
                'rules'     => 'required',
                'label'     => 'NIPD',
                'errors'    => [
                    'required'  => '{field} tidak boleh kosong',
                ]
            ],
            'namasiswa'     => [
                'rules'     => 'required',
                'label'     => 'Nama Siswa',
                'errors'    => [
                    'required'  => '{field} tidak boleh kosong',
                ]
            ],
        ]);

        if (!$valid) {
            $error = [
                'nipdsiswa'      => $validation->getError('nipdsiswa'),
                'namasiswa'      => $validation->getError('namasiswa'),

            ];

            $json =  [
                'error'  => $error
            ];
        } else {
            $model = new ModelSiswa();
            $model->update([
                
                'nipd'          => $nipdsiswa,
                'nama_siswa'    => $namasiswa,
            ]);
            $json = [
                'sukses'        => 'Data  berhasil diupdate...'
            ];
        }
        echo json_encode($json);
    }
    function hapus(id) {
        // SweetAlert for confirmation
        Swal.fire({
            title: 'Hapus',
            text: 'Hapus Data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: '/pisau/delete/' + id, 
                    data : {
                        id : id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil dihapus'
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status, thrownError);
                        alert('Failed to delete data. Check the console for details.');
                    }
                });
            }
        });
    }
}
