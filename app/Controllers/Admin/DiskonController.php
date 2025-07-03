<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DiskonModel;
use CodeIgniter\HTTP\ResponseInterface;

class DiskonController extends BaseController
{
    protected $diskonModel;

    public function __construct()
    {
        $this->diskonModel = new DiskonModel();
    }

    public function index()
    {
        $data['diskon'] = $this->diskonModel->findAll();
        return view('a_diskon', $data);
    }

    public function store()
    {
        $rules = [
            'tanggal' => 'required|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->diskonModel->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update($id)
    {
        $rules = [
            'tanggal' => 'required|valid_date[Y-m-d]',
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Cek jika tanggal diubah, pastikan tidak bentrok dengan data lain
        $inputTanggal = $this->request->getPost('tanggal');
        $existing = $this->diskonModel
            ->where('tanggal', $inputTanggal)
            ->where('id !=', $id)
            ->first();

        if ($existing) {
            return redirect()->back()->withInput()->with('errors', ['Tanggal sudah digunakan.']);
        }

        $this->diskonModel->update($id, [
            'tanggal' => $inputTanggal,
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('/diskon')->with('success', 'Data berhasil diupdate.');
    }
    public function delete($id)
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/diskon')->with('errors', ['Invalid request method.']);
        }

        $this->diskonModel->delete($id);
        return redirect()->to('/diskon')->with('success', 'Data berhasil dihapus.');
    }

}
