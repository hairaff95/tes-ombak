<?php

namespace App\Controllers;

use App\Models\ProductModel; 
use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class Home extends BaseController
{
    protected $product;
    protected $user;
    protected $transaction;
    protected $transaction_detail;

    function __construct()
    {
        helper('form');
        helper('number');
        $this->product = new ProductModel();
        $this->user = new UserModel(); 
        $this->transaction = new TransactionModel();
        $this->transaction_detail = new TransactionDetailModel();
        // <!--tambahan sendiri-->
    }

    public function index()
    {
        $product = $this->product->findAll();
        $users = $this->user->findAll();
        $data['product'] = $product;
        $data['users'] = $users;
        return view('a_home', $data);
    }
    // public function index(): string
    // {
    //     return view('a_home');
    // }
    public function profile()
{
    $username = session()->get('username');
    $data['username'] = $username;

    $buy = $this->transaction->where('username', $username)->findAll();
    $data['buy'] = $buy;

    $product = [];

    if (!empty($buy)) {
        foreach ($buy as $item) {
            $detail = $this->transaction_detail->select('transaction_detail.*, product.nama, product.harga, product.foto')->join('product', 'transaction_detail.product_id=product.id')->where('transaction_id', $item['id'])->findAll();

            if (!empty($detail)) {
                $product[$item['id']] = $detail;
            }
        }
    }

    $data['product'] = $product;

    return view('a_profile', $data);
}
}
