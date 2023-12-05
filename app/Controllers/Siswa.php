<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModdelDataSIswa;
use App\Models\ModelDataSiswa;
use App\Models\ModelSiswa;
use Config\Services;

class Siswa extends BaseController
{
    public function index()
    {
        $data['title'] = 'List Siswa | Fathanalii';
        return view('siswa/v_siswa', $data);
    }

    public function listData()
    {

        $request    = Services::request();
        $datatable  = new ModelDataSiswa ($request);

        if ($request->getMethod(true) === 'POST') {
            $lists  = $datatable->getDatatables();
            $data   = [];
            $no     = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tombolview = '<button type="button" class="btn btn-sm btn-outline-info" id="tomboledit_' . $list->id . '" title="Edit Data"  onclick="edit(\'' . $list->id . '\')">
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
                $row[]  = $tombolview. '  ' .$tomboledit . '  ' . $tombolhapus;
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
        $namasiswa        = $this->request->getVar('namasiswa');

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
                'label'     => 'NAMA SISWA',
                'errors'    => [
                    'required'  => '{field} tidak boleh kosong',
                ]
            ],
        ]);

        if (!$valid) {
            $error = [
                'nipdsiswa'      => $validation->getError('nipdsiswa'),
                'namasiswa'         => $validation->getError('namasiswa'),

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
                'sukses' => 'Data  berhasi disimpan...'
            ];
        }
        echo json_encode($json);
    }

}
