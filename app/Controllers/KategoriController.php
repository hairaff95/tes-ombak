<?php

namespace App\Controllers;

use App\Models\KategoriProdukModel;

class KategoriController extends BaseController
{
    protected $kategori;

    public function __construct()
    {
        $this->kategori = new KategoriProdukModel();
    }

    public function index()
    {
        $data['kategori'] = $this->kategori->findAll();
        return view('a_kategori', $data);
    }

    public function create()
    {
        $dataForm = [
            'category_name' => $this->request->getPost('category_name'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        if ($this->kategori->insert($dataForm) === false) {
            // Jika validasi gagal
            return redirect()->back()->with('errors', $this->kategori->errors());
        }

        return redirect()->to('kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dataForm = [
            'category_name' => $this->request->getPost('category_name'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        if ($this->kategori->update($id, $dataForm) === false) {
            // Jika validasi gagal
            return redirect()->back()->with('errors', $this->kategori->errors());
        }

        return redirect()->to('kategori')->with('success', 'Kategori berhasil diubah');
    }

    public function delete($id)
    {
        $this->kategori->delete($id);
        return redirect()->to('kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
