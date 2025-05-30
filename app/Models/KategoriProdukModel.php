<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriProdukModel extends Model
{
    protected $table      = 'product_category';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['category_name'];
    protected $validationRules    = [
        'category_name' => 'required|min_length[2]|max_length[100]',
    ];
    protected $validationMessages = [
        'category_name' => [
            'required' => 'Nama kategori harus diisi',
            'min_length' => 'Nama kategori minimal 2 karakter',
            'max_length' => 'Nama kategori maksimal 100 karakter',
        ],
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $skipValidation     = false;
}